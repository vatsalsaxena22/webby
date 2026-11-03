<?php

function site_theme(): array
{
    return [
        'primary' => '#14b8a6',
        'secondary' => '#0f172a',
        'mode' => 'light',
    ];
}

function render_site_theme(array $theme): void
{
    $primary = preg_match('/^#[0-9a-f]{6}$/i', $theme['primary'] ?? '')
        ? $theme['primary']
        : '#14b8a6';
    $secondary = preg_match('/^#[0-9a-f]{6}$/i', $theme['secondary'] ?? '')
        ? $theme['secondary']
        : '#0f172a';
    $mode = ($theme['mode'] ?? '') === 'dark' ? 'dark' : 'light';
    $rgb = sscanf($primary, '#%02x%02x%02x') ?: [20, 184, 166];

    $tailwindConfig = [
        'theme' => [
            'extend' => [
                'colors' => [
                    'brand' => [
                        50 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 6%, white)',
                        100 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 12%, white)',
                        200 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 25%, white)',
                        300 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 45%, white)',
                        400 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 70%, white)',
                        500 => 'rgb(var(--brand-rgb) / <alpha-value>)',
                        600 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 88%, black)',
                        700 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 72%, black)',
                        800 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 55%, black)',
                        900 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 38%, black)',
                        950 => 'color-mix(in srgb, rgb(var(--brand-rgb)) 24%, #042f2e)',
                    ],
                    'dark' => [
                        950 => $secondary,
                        900 => '#0f172a',
                        800 => '#1e293b',
                        700 => '#334155',
                    ],
                    'surface' => [
                        'DEFAULT' => $mode === 'dark' ? '#0f172a' : '#ffffff',
                        'muted' => $mode === 'dark' ? '#111c2e' : '#f8fafc',
                    ],
                ],
                'fontFamily' => [
                    'sans' => ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    'display' => ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'sans-serif'],
                ],
                'maxWidth' => ['8xl' => '90rem'],
                'boxShadow' => [
                    'soft' => '0 10px 40px rgba(15, 23, 42, 0.08)',
                    'soft-lg' => '0 20px 60px rgba(15, 23, 42, 0.12)',
                ],
                'animation' => [
                    'fade-in' => 'fadeIn 0.6s ease-out',
                    'slide-up' => 'slideUp 0.6s ease-out',
                    'float' => 'float 4s ease-in-out infinite',
                ],
                'keyframes' => [
                    'fadeIn' => [
                        '0%' => ['opacity' => '0'],
                        '100%' => ['opacity' => '1'],
                    ],
                    'slideUp' => [
                        '0%' => ['opacity' => '0', 'transform' => 'translateY(20px)'],
                        '100%' => ['opacity' => '1', 'transform' => 'translateY(0)'],
                    ],
                    'float' => [
                        '0%, 100%' => ['transform' => 'translateY(0)'],
                        '50%' => ['transform' => 'translateY(-10px)'],
                    ],
                ],
            ],
        ],
    ];

    $configJson = json_encode(
        $tailwindConfig,
        JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
    );

    if ($configJson === false) {
        throw new RuntimeException('Unable to encode the Tailwind theme configuration.');
    }

    echo '<script src="https://cdn.tailwindcss.com"></script>';
    echo '<script>tailwind.config = ' . $configJson . ';</script>';
    echo '<style>:root{--brand-rgb:' . implode(' ', array_map('intval', $rgb))
        . ';--color-dark:' . e($secondary) . ';}</style>';
}
