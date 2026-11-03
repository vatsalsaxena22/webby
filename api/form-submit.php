<?php

/**
 * Webby - Contact Form API
 *
 * Endpoint:
 * POST /api/form-submit.php
 *
 * Expected fields:
 * name
 * email
 * phone
 * company
 * service
 * message
 */


// ---------------------------------------------------------
// Response Headers
// ---------------------------------------------------------

header('Content-Type: application/json; charset=UTF-8');


// ---------------------------------------------------------
// Allow POST Only
// ---------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed.'
    ]);

    exit;
}


// ---------------------------------------------------------
// Database
// ---------------------------------------------------------

require_once __DIR__ . '/../includes/site.php';

if (CSRF_ENABLED && !csrf_valid($_POST['csrf'] ?? '')) {
    respond(false, 'Your session expired. Please refresh and try again.', 419);
}


// ---------------------------------------------------------
// Helper Function
// ---------------------------------------------------------

function respond(
    bool $success,
    string $message,
    int $statusCode = 200
): void {

    http_response_code($statusCode);

    echo json_encode([
        'success' => $success,
        'message' => $message
    ]);

    exit;
}


// ---------------------------------------------------------
// Request Data
// ---------------------------------------------------------

$name = trim($_POST['name'] ?? '');

$email = trim($_POST['email'] ?? '');

$phone = trim($_POST['phone'] ?? '');

$company = trim($_POST['company'] ?? '');

$service = trim($_POST['service'] ?? '');

$message = trim($_POST['message'] ?? '');


// ---------------------------------------------------------
// Honeypot Spam Protection
//
// Add this field to the form later if needed:
// <input type="text" name="website" class="hidden">
// ---------------------------------------------------------

$website = trim($_POST['website'] ?? '');

if ($website !== '') {

    // Pretend the request was successful.
    // This prevents simple bots from knowing
    // that they were blocked.

    respond(
        true,
        'Your message has been received.'
    );
}


// ---------------------------------------------------------
// Required Fields
// ---------------------------------------------------------

if (
    $name === '' ||
    $email === '' ||
    $service === '' ||
    $message === ''
) {

    respond(
        false,
        'Please fill in all required fields.',
        422
    );
}


// ---------------------------------------------------------
// Name Validation
// ---------------------------------------------------------

if (mb_strlen($name) < 2) {

    respond(
        false,
        'Please enter a valid name.',
        422
    );
}

if (mb_strlen($name) > 100) {

    respond(
        false,
        'Name is too long.',
        422
    );
}


// ---------------------------------------------------------
// Email Validation
// ---------------------------------------------------------

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    respond(
        false,
        'Please enter a valid email address.',
        422
    );
}

if (mb_strlen($email) > 150) {

    respond(
        false,
        'Email address is too long.',
        422
    );
}


// ---------------------------------------------------------
// Phone Validation
// ---------------------------------------------------------

if ($phone !== '') {

    if (mb_strlen($phone) > 30) {

        respond(
            false,
            'Phone number is too long.',
            422
        );
    }

    // Allow common international phone characters.
    // Example:
    // +91 98765 43210
    // +1-555-123-4567

    if (!preg_match('/^[0-9+\-\s().]+$/', $phone)) {

        respond(
            false,
            'Please enter a valid phone number.',
            422
        );
    }
}


// ---------------------------------------------------------
// Company Validation
// ---------------------------------------------------------

if (mb_strlen($company) > 150) {

    respond(
        false,
        'Company name is too long.',
        422
    );
}


// ---------------------------------------------------------
// Service Validation
// ---------------------------------------------------------

$allowed_services = [

    'Website Development',

    'Web Application',

    'E-commerce Development',

    'UI Development',

    'Website Maintenance',

    'Custom Solution',

    'Other'

];

if (!in_array($service, $allowed_services, true)) {

    respond(
        false,
        'Please select a valid service.',
        422
    );
}


// ---------------------------------------------------------
// Message Validation
// ---------------------------------------------------------

if (mb_strlen($message) < 10) {

    respond(
        false,
        'Please provide a little more information about your project.',
        422
    );
}

if (mb_strlen($message) > 5000) {

    respond(
        false,
        'Your message is too long.',
        422
    );
}


// ---------------------------------------------------------
// Save Submission
// ---------------------------------------------------------

try {

    $sql = "
        INSERT INTO contact_submissions
        (
            name,
            email,
            phone,
            company,
            service,
            message,
            status,
            created_at
        )
        VALUES
        (
            :name,
            :email,
            :phone,
            :company,
            :service,
            :message,
            'new',
            NOW()
        )
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([

        ':name' => $name,

        ':email' => $email,

        ':phone' => $phone !== ''
            ? $phone
            : null,

        ':company' => $company !== ''
            ? $company
            : null,

        ':service' => $service,

        ':message' => $message

    ]);

    // Mail delivery is deliberately non-blocking: submissions stay in the
    // dashboard if the SMTP provider has a temporary outage.
    send_submission_email([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'service' => $service,
        'message' => $message
    ], site_settings($pdo));


    // -----------------------------------------------------
    // Success
    // -----------------------------------------------------

    respond(
        true,
        'Thank you! Your message has been sent successfully.'
    );
} catch (PDOException $e) {

    // Log actual error internally.

    error_log(
        'Webby Contact Form Error: ' . $e->getMessage()
    );


    // Do not expose database details.

    respond(
        false,
        'Something went wrong while sending your message. Please try again later.',
        500
    );
}
