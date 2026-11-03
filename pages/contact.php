<?php

$page_title = 'Contact Webby — Start Your Project';
$page_description = 'Have a project in mind? Contact Webby to discuss your website, web application or digital solution.';
$page_keywords = 'contact Webby, web development quote, website development enquiry, start a project';

require_once __DIR__ . '/../includes/site.php';
csrf_token();

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
?>

<main class="overflow-hidden bg-white">
    <!-- Hero -->
    <section class="relative isolate bg-white pt-32 sm:pt-36 lg:pt-44">
        <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -left-36 top-8 h-96 w-96 rounded-full bg-brand-100/70 blur-3xl"></div>
            <div class="absolute -right-36 top-12 h-[28rem] w-[28rem] rounded-full bg-cyan-100/50 blur-3xl"></div>
            <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
        </div>
        <div class="mx-auto max-w-7xl px-4 pb-14 sm:px-6 sm:pb-20 lg:px-8 lg:pb-24">
            <div class="grid items-end gap-8 lg:grid-cols-[1.1fr_.9fr] lg:gap-14">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-4 py-2 text-xs font-bold uppercase tracking-[.16em] text-brand-700">
                        <span class="h-2 w-2 rounded-full bg-brand-500"></span>
                        Get in touch
                    </span>
                    <h1 class="mt-6 max-w-3xl font-display text-4xl font-extrabold leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-7xl">
                        Let's build something <span class="text-brand-500">meaningful.</span>
                    </h1>
                </div>
                <div class="max-w-xl lg:pb-1">
                    <p class="text-base leading-8 text-slate-600 sm:text-lg">
                        Have an idea, a business requirement or a project you want to discuss? Send us a message and let's start the conversation.
                    </p>
                    <div class="mt-6 flex flex-wrap items-center gap-3 text-xs font-semibold text-slate-500">
                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-2"><i class="fa-solid fa-message text-brand-600" aria-hidden="true"></i> Direct conversation</span>
                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-2"><i class="fa-solid fa-lightbulb text-brand-600" aria-hidden="true"></i> Ideas welcome</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact details and form -->
    <section class="relative bg-slate-50 py-14 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[.78fr_1.22fr] lg:gap-12">
                <aside class="flex flex-col">
                    <div class="max-w-lg">
                        <p class="text-xs font-bold uppercase tracking-[.18em] text-brand-700">Let's talk</p>
                        <h2 class="mt-3 font-display text-3xl font-extrabold leading-tight tracking-tight text-slate-950 sm:text-4xl">Tell us what you're working on.</h2>
                        <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                            Whether you already have a detailed requirement or just an initial idea, we're happy to hear about it.
                        </p>
                    </div>

                    <div class="mt-8 space-y-3">
                        <a href="mailto:<?= e($site['email']); ?>" class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-lg hover:shadow-slate-900/5">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-[11px] font-bold uppercase tracking-[.15em] text-slate-400">Email us</span>
                                <span class="mt-1 block break-words text-sm font-bold text-slate-900 transition group-hover:text-brand-700"><?= e($site['email']); ?></span>
                                <span class="mt-1 block text-xs text-slate-500">Send us your requirements</span>
                            </span>
                            <i class="fa-solid fa-arrow-up-right-from-square mt-1 text-xs text-slate-300 transition group-hover:text-brand-600" aria-hidden="true"></i>
                        </a>

                        <a href="tel:<?= e(preg_replace('/[^0-9+]/', '', $site['phone'])); ?>" class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5 transition duration-300 hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-lg hover:shadow-slate-900/5">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700 transition group-hover:bg-brand-600 group-hover:text-white"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-[11px] font-bold uppercase tracking-[.15em] text-slate-400">Call us</span>
                                <span class="mt-1 block text-sm font-bold text-slate-900 transition group-hover:text-brand-700"><?= e($site['phone']); ?></span>
                                <span class="mt-1 block text-xs text-slate-500">Let's discuss your project</span>
                            </span>
                            <i class="fa-solid fa-arrow-up-right-from-square mt-1 text-xs text-slate-300 transition group-hover:text-brand-600" aria-hidden="true"></i>
                        </a>

                        <?php if (!empty($site['address'])): ?>
                            <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-[11px] font-bold uppercase tracking-[.15em] text-slate-400">Find us</span>
                                    <span class="mt-1 block text-sm font-semibold leading-6 text-slate-900"><?= e($site['address']); ?></span>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-5">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fa-regular fa-clock" aria-hidden="true"></i></span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-[11px] font-bold uppercase tracking-[.15em] text-slate-400">Availability</span>
                                <span class="mt-1 block text-sm font-bold text-slate-900">Monday — Friday</span>
                                <span class="mt-1 block text-xs text-slate-500">10:00 AM — 6:00 PM</span>
                            </span>
                        </div>
                    </div>

                    <div class="relative mt-5 overflow-hidden rounded-2xl bg-slate-950 p-6 sm:p-7">
                        <div class="pointer-events-none absolute -right-10 -top-16 h-40 w-40 rounded-full bg-brand-600/25 blur-3xl"></div>
                        <div class="relative flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500 text-white"><i class="fa-solid fa-comments" aria-hidden="true"></i></span>
                            <div>
                                <h3 class="font-display text-lg font-bold text-white">Let's start with a conversation.</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-400">No complicated process. Tell us what you need and we'll take it from there.</p>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Contact form -->
                <div class="min-w-0">
                    <div class="rounded-[1.75rem] border border-slate-200 bg-white p-5 shadow-[0_24px_80px_-45px_rgba(15,23,42,.3)] sm:p-8 lg:p-10">
                        <div class="mb-8 flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[.16em] text-brand-700">Project enquiry</p>
                                <h2 class="mt-2 font-display text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Start a conversation</h2>
                                <p class="mt-2 text-sm leading-6 text-slate-500">Share a few details and we'll take it from here.</p>
                            </div>
                            <span class="hidden h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-brand-50 text-brand-700 sm:flex"><i class="fa-regular fa-paper-plane text-lg" aria-hidden="true"></i></span>
                        </div>

                        <div id="form-message" class="mb-6 hidden rounded-xl border px-4 py-3 text-sm" role="alert" aria-live="polite"></div>

                        <form id="contact-form" action="<?= e(app_url('/api/form-submit.php')); ?>" method="POST" novalidate>
                            <input type="hidden" name="csrf" value="<?= e(csrf_token()); ?>">
                            <!-- Honeypot: leave hidden from real visitors -->
                            <div class="hidden" aria-hidden="true">
                                <label for="website">Leave this field empty</label>
                                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Name <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" required minlength="2" maxlength="<?= CONTACT_NAME_MAX_LENGTH; ?>" autocomplete="name" placeholder="Your name"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                                </div>
                                <div>
                                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email" required maxlength="<?= CONTACT_EMAIL_MAX_LENGTH; ?>" autocomplete="email" placeholder="you@example.com"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                                </div>
                            </div>

                            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">Phone <span class="text-xs font-normal text-slate-400">(optional)</span></label>
                                    <input type="tel" id="phone" name="phone" maxlength="<?= CONTACT_PHONE_MAX_LENGTH; ?>" autocomplete="tel" inputmode="tel" placeholder="+91 00000 00000"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                                </div>
                                <div>
                                    <label for="company" class="mb-2 block text-sm font-semibold text-slate-700">Company <span class="text-xs font-normal text-slate-400">(optional)</span></label>
                                    <input type="text" id="company" name="company" maxlength="<?= CONTACT_COMPANY_MAX_LENGTH; ?>" autocomplete="organization" placeholder="Company name"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                                </div>
                            </div>

                            <div class="mt-5">
                                <label for="service" class="mb-2 block text-sm font-semibold text-slate-700">What can we help with? <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="service" name="service" required
                                        class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-3.5 pr-11 text-sm text-slate-900 outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10">
                                        <option value="">Select a service</option>
                                        <option value="Website Development">Website Development</option>
                                        <option value="Web Application">Web Application</option>
                                        <option value="E-commerce Development">E-commerce Development</option>
                                        <option value="UI Development">UI Development</option>
                                        <option value="Website Maintenance">Website Maintenance</option>
                                        <option value="Custom Solution">Custom Solution</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <label for="message" class="block text-sm font-semibold text-slate-700">Tell us about your project <span class="text-red-500">*</span></label>
                                    <span id="message-counter" class="shrink-0 text-xs tabular-nums text-slate-400">0 / <?= CONTACT_MESSAGE_MAX_LENGTH; ?></span>
                                </div>
                                <textarea id="message" name="message" rows="6" required minlength="<?= CONTACT_MESSAGE_MIN_LENGTH; ?>" maxlength="<?= CONTACT_MESSAGE_MAX_LENGTH; ?>" placeholder="Tell us about your idea, requirements, goals or anything else that might help us understand your project."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm leading-6 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10"></textarea>
                            </div>

                            <button type="submit" id="submit-button" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-slate-950/10 transition duration-300 hover:-translate-y-0.5 hover:bg-brand-600 disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0">
                                <span id="submit-text">Send Message</span>
                                <i id="submit-icon" class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
                            </button>
                            <p class="mt-4 text-center text-xs leading-5 text-slate-400">By submitting this form, you agree to be contacted regarding your enquiry.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing note -->
    <section class="bg-white px-4 py-16 sm:px-6 sm:py-20 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-50 text-brand-600"><i class="fa-solid fa-rocket text-xl" aria-hidden="true"></i></span>
            <h2 class="mt-6 font-display text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Your next project starts here.</h2>
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">We don't just build websites. We build digital solutions designed to help businesses move forward.</p>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-form');
        const messageBox = document.getElementById('form-message');
        const submitButton = document.getElementById('submit-button');
        const submitText = document.getElementById('submit-text');
        const submitIcon = document.getElementById('submit-icon');
        const messageField = document.getElementById('message');
        const messageCounter = document.getElementById('message-counter');

        if (!form) return;

        const maxLength = <?= (int) CONTACT_MESSAGE_MAX_LENGTH; ?>;

        function updateCounter() {
            messageCounter.textContent = messageField.value.length + ' / ' + maxLength;
        }

        function showMessage(text, type) {
            messageBox.className = 'mb-6 rounded-xl border px-4 py-3 text-sm';
            messageBox.classList.add('border', ...(type === 'success' ?
                ['border-green-200', 'bg-green-50', 'text-green-700'] :
                ['border-red-200', 'bg-red-50', 'text-red-700']));
            messageBox.textContent = text;
        }

        messageField.addEventListener('input', updateCounter);
        updateCounter();

        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            messageBox.className = 'mb-6 hidden rounded-xl border px-4 py-3 text-sm';
            messageBox.textContent = '';

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const service = document.getElementById('service').value.trim();
            const message = messageField.value.trim();

            if (!name || !email || !service || !message) {
                showMessage('Please fill in all required fields.', 'error');
                return;
            }

            if (name.length < 2 || message.length < <?= (int) CONTACT_MESSAGE_MIN_LENGTH; ?>) {
                showMessage('Please check your name and project message, then try again.', 'error');
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                showMessage('Please enter a valid email address.', 'error');
                return;
            }

            submitButton.disabled = true;
            submitText.textContent = 'Sending...';
            submitIcon.className = 'fa-solid fa-spinner fa-spin text-xs';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                let data;
                try {
                    data = await response.json();
                } catch {
                    throw new Error('The server returned an unexpected response.');
                }

                if (response.ok && data.success) {
                    showMessage(data.message || 'Your message has been sent successfully.', 'success');
                    form.reset();
                    updateCounter();
                } else {
                    showMessage(data.message || 'Something went wrong. Please try again.', 'error');
                }
            } catch (error) {
                showMessage('Unable to send your message right now. Please try again later.', 'error');
                console.error(error);
            } finally {
                submitButton.disabled = false;
                submitText.textContent = 'Send Message';
                submitIcon.className = 'fa-solid fa-arrow-right text-xs';
            }
        });
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>