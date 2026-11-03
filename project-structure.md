webby/
│
├── assets/
│   ├── css/
│   │   └── app.css           # Site-wide base styles and light/dark theme behavior
│   ├── images/
│   └── js/
│
├── api/
│   └── form-submit.php
│
├── config/
│   ├── app.php
│   └── database.php
│
├── includes/
│   ├── header.php
│   ├── navbar.php
│   ├── footer.php
│   ├── site.php
│   └── theme.php
│
├── pages/
│   ├── about.php
│   ├── contact.php
│   ├── projects.php
│   └── services.php
│
├── admin/
│   ├── bootstrap.php
│   ├── layout.php
│   ├── operations.php
│   ├── index.php
│   ├── login.php
│   ├── projects.php
│   ├── settings.php
│   ├── submissions.php
│   └── logout.php
├── uploads/                  # Admin-managed project and logo images
├── database.sql
└── index.php

## Requirements and setup

- PHP 8.0 or newer with PDO MySQL enabled, plus MySQL/MariaDB.
- Configure `APP_URL`, `APP_ENV`, `DB_HOST`, `DB_NAME`, `DB_USER`, and
  `DB_PASSWORD` as environment variables for the target environment. Production
  requires all four database values; the local Docker defaults are for
  development only.
- No Node.js, npm, or build step is needed to run or deploy the website. Tailwind
  utilities are loaded from the CDN. The shared Tailwind config and site theme
  live in `includes/theme.php` and are used by both the website and admin panel.
- Rebrand the site by changing the primary color, secondary color, or mode in
  `includes/theme.php`. Brand-* utilities and the light/dark theme update on
  both the website and admin panel.
- Create/select your MySQL database in the hosting control panel, configure the
  `DB_*` environment values in the server environment, then import
  `database.sql` into that selected database.
- Admin-managed project and logo images are stored in the root `uploads/`
  directory. Keep script execution disabled there in the web server.
- Admin operations are separated into dashboard, projects, enquiries, and
  business settings pages. Configure social profile URLs in Business settings;
  empty links are hidden. The contact FAB uses the WhatsApp URL or business
  phone number, and the phone CTA uses the configured business phone.