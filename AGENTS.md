# AGENTS.md

This file is a working guide for AI agents and developers modifying this repository. It documents what this project is, how the pieces fit together, how to run it, and the local conventions that matter.

## Project Summary

This repository is a Laravel 10 application for managing physical site/security operations. The app tracks companies, sites, regions, QR/live tags, site inspectors, supervisors, personnel/security guards, scan rounds, attendance check-ins/check-outs, incidents, FAQs, and dashboards/analytics.

The product has three main usage surfaces:

- Public website: landing page, about page, FAQ page, and contact form with reCAPTCHA.
- Web back office: admin and company-owner dashboards built with Blade.
- Mobile API: Sanctum-authenticated endpoints for login, dashboard data, scans, attendance, guards, incidents, and uploads.

The codebase is a server-rendered Laravel app with Tailwind/Vite assets, Spatie role management, Laravel Sanctum API tokens, Laravel Excel exports, optional S3 uploads, and PostgreSQL-oriented analytics SQL.

## Technology Stack

- PHP: `^8.1`
- Framework: Laravel `^10.10`
- Auth scaffolding: Laravel Breeze
- API auth: Laravel Sanctum
- Roles/permissions: `spatie/laravel-permission`
- Excel exports: `maatwebsite/excel`
- File storage: Laravel filesystem, with S3 support configured
- reCAPTCHA: `josiasmontag/laravel-recaptchav3`
- Frontend build: Vite 5, Tailwind CSS 3, Alpine.js, Axios
- Tests: PHPUnit 10
- Docker: PHP-FPM 8.1 plus Nginx; the Dockerfile installs PostgreSQL PHP extensions and Node 18

## Important Setup Notes

- The README documents Docker setup and exposes Nginx on `http://localhost:5454`.
- `docker-compose.yml` defines only the PHP-FPM app container and Nginx container. It does not define a database container.
- `config/database.php` defaults to MySQL if `DB_CONNECTION` is unset, but several analytics queries use PostgreSQL-specific functions such as `DATE_TRUNC`, `TO_CHAR`, and `ILIKE`. Prefer PostgreSQL for realistic local/dev parity unless the queried code is updated.
- `config/app.php` sets the timezone to `Africa/lagos`.
- `vite.config.js` builds `resources/css/app.css` and `resources/js/app.js`.
- Static frontend assets live under `public/assets`.
- User-uploaded public files may need `php artisan storage:link`.

## Common Commands

Install dependencies:

```bash
composer install
npm install
```

Run the app locally without Docker, assuming PHP, Composer, Node, and a database are already configured:

```bash
php artisan serve
npm run dev
```

Run with Docker, as described by the README:

```bash
docker-compose build
docker-compose up
docker-compose exec pmsapp composer install
docker-compose exec pmsapp npm install
docker-compose exec pmsapp php artisan key:generate
docker-compose exec pmsapp npm run dev
```

Build frontend assets:

```bash
npm run build
```

Run tests:

```bash
php artisan test
```

Format PHP code if desired:

```bash
./vendor/bin/pint
```

Useful setup/population commands:

```bash
php artisan populate:country
php artisan populate:roles
php artisan populate:industries
php artisan setup:app
```

Be careful with `setup:app`: outside production it runs `migrate:fresh`, which drops and recreates tables.

Custom generators:

```bash
php artisan make:repo ModelName
php artisan make:service ModelName
```

## Environment Variables To Notice

The app uses normal Laravel environment variables plus project-specific values:

- `CONTACT_US_EMAIL`: destination for contact form mail; default is configured in `config/app.php`.
- `SUPER_ADMIN_EMAIL`, `SUPER_ADMIN_PASSWORD`: used by `setup:app`.
- `ADMIN_EMAIL`, `ADMIN_PASSWORD`: used by `setup:app`.
- `COMPANY_OWNER_EMAIL`, `COMPANY_OWNER_PASSWORD`: used by `setup:app`.
- `SITE_INSPECTOR_EMAIL`, `SITE_INSPECTOR_PASSWORD`: used by `setup:app`.
- AWS/S3 variables: `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_DEFAULT_REGION`, `AWS_BUCKET`, `AWS_URL`, `AWS_ENDPOINT`, `AWS_USE_PATH_STYLE_ENDPOINT`.
- Database variables should be set explicitly. For production-like analytics behavior, use PostgreSQL settings.

Do not commit `.env` secrets.

## Directory Map

- `app/Console/Commands`: custom Artisan commands for setup, seed data population, and generator commands.
- `app/Enums`: string-backed enums for roles, analytics frequencies, and attendance actions.
- `app/Exceptions`: custom exception classes.
- `app/Exports`: Laravel Excel exports for attendance, incidents, and scans.
- `app/Helpers`: globally autoloaded helper functions from Composer.
- `app/Http/Controllers`: web, admin, company, mobile API, auth, credential, analytics, and utility controllers.
- `app/Http/Middleware`: auth/role/status middleware.
- `app/Http/Requests`: FormRequest validation for web and API writes.
- `app/Http/Resources`: currently contains a suspiciously named `IncidentController.php`; inspect before using as a normal resource layer.
- `app/Mail`: contact form mailable.
- `app/Models`: Eloquent models for the domain.
- `app/Providers`: Laravel providers, including `RepositoryServiceProvider`.
- `app/QueryFilters`: pipeline filters applied to index/export queries.
- `app/Repositories`: Eloquent repository layer.
- `app/Scopes`: auth-aware Eloquent global scopes.
- `app/Services`: analytics, file upload, incident, and user services.
- `app/Traits`: API response and search helpers.
- `app/View/Components`: Blade component classes.
- `database/factories`: factories for demo/test data.
- `database/migrations`: schema definition and later schema changes.
- `database/seeders`: development seeders.
- `docker-compose`: Nginx and PHP local config.
- `public`: Laravel front controller, static assets, favicon assets, country/state JSON.
- `resources/css`: Tailwind entry CSS.
- `resources/js`: Vite JavaScript entry and Axios/bootstrap setup.
- `resources/views`: Blade screens, layouts, components, dashboards, admin/company CRUD, analytics, auth, profile, FAQs, and public pages.
- `routes`: route files. `RouteServiceProvider` loads `web.php`, `admin.php`, `api.php`, `auth.php`, `console.php`, and `channels.php`.
- `tests`: default Breeze/Laravel feature and unit tests.

## Domain Model

Core tables and models:

- `User`: authenticatable user with Sanctum tokens and Spatie roles. Users can be admins, company owners, site inspectors, supervisors, personnel, resellers, or super admins.
- `Company`: tenant/customer organization. A company has an owner user, industry, state, sites, users, tags, scans, and attendance records.
- `Region`: grouping of sites inside a company. A region has a supervisor user and many sites.
- `Site`: physical location owned by a company, assigned to an inspector, optionally assigned to a region, with coordinates, shift times, expected tag/round counts, and a logout PIN.
- `Tag`: QR/live checkpoint tag attached to a site and company, optionally with coordinates.
- `Scan`: record of a site inspector scanning a tag at a time/date/round with distance/proximity/gap metrics.
- `Attendance`: personnel/security guard check-in or check-out record with location, image, action type, and duration.
- `Incident`: reported incident for a site/company with type `rapid` or `storage`, image, comment, reporter, and optional mobile sync id.
- `Country`, `State`, `Industry`: lookup data.
- `FrequentlyAskedQuestion`: FAQ content for the public site and admin FAQ management.

Key relationships:

- Company owner: `Company.owner_id -> users.id`
- Company creator: `Company.created_by -> users.id`
- Company users: `users.company_id`
- Site company: `sites.company_id`
- Site inspector: `sites.inspector_id -> users.id`
- Site region: `sites.region_id`
- Region supervisor: `regions.supervisor_id -> users.id`
- Tag site/company: `tags.site_id`, `tags.company_id`
- Scan site/tag/company/scanner: `scans.site_id`, `scans.tag_id`, `scans.company_id`, `scans.scanned_by`
- Attendance site/company/user: `attendances.site_id`, `attendances.company_id`, `attendances.user_id`
- Incident site/company/user/reporter: `incidents.site_id`, `incidents.company_id`, `incidents.user_id`, `incidents.reported_by`

## Roles And Access Control

Roles are defined in `app/Enums/RoleEnum.php`:

- `super_admin`
- `admin`
- `reseller`
- `site_inspector`
- `company_owner`
- `personnel`
- `supervisor`

Role records are populated by `php artisan populate:roles`. Role checks generally use Spatie's `hasRole`.

Middleware aliases in `app/Http/Kernel.php`:

- `administrator`: allows `super_admin` and `admin`.
- `company_owner`: allows only `company_owner`.
- `is_banned`: redirects/logs out inactive users through `IsBannedWebMiddlware`.

Important user helpers on `App\Models\User`:

- `isAdministrator()`
- `isSuperAdmin()`
- `isAdmin()`
- `isCompanyOwner()`
- `isSiteInspector()`
- `isSecurity()`
- `isPersonnel()`

`isSecurity()` currently checks `RoleEnum::SECURITY`, but `RoleEnum` does not define `SECURITY`. Treat this as a known bug or stale method.

## Multi-Tenancy And Global Scopes

The app uses auth-aware global Eloquent scopes rather than a full tenancy package.

`FilterByCompanyIdScope` applies to `User`, `Site`, `Region`, `Tag`, `Scan`, `Attendance`, and `Incident`. When an authenticated user has role `company_owner`, `site_inspector`, or `supervisor`, queries are automatically constrained by `{table}.company_id = auth()->user()->company_id`.

`FilterByCompanyAndSiteIdScope` exists but is not widely used. It constrains personnel by `company_id`.

Important implications:

- Admin users generally see all records because the company filter does not apply to admin roles.
- Company owners, site inspectors, and supervisors may get filtered results even when a repository/controller query does not explicitly add a company condition.
- When writing admin-side maintenance, exports, seeders, and tests, be aware of authenticated global scopes. Use `withoutGlobalScopes()` only when you have verified it is correct and safe.

## Request Flow And Layers

Common web flow:

1. Route in `routes/web.php` or `routes/admin.php`.
2. Middleware checks auth, role, and status.
3. Controller receives a FormRequest for writes or `Request` for indexes.
4. Controller builds an Eloquent query through a repository.
5. Search and query filter pipelines are applied.
6. Controller returns a Blade view or redirect with flash messages.

Common mobile API flow:

1. Route in `routes/api.php`.
2. Login creates a Sanctum token.
3. Authenticated endpoints run under `auth:sanctum`.
4. Controller validates with FormRequest where applicable.
5. Controllers use repositories/models and return JSON through `sendSuccess`, `sendError`, or `ApiResponseTrait`.

Repository layer:

- `BaseRepository` wraps common Eloquent operations.
- Concrete repositories are thin wrappers around models, with a few custom analytics helpers.
- Controllers inject concrete repositories directly rather than interfaces.
- `RepositoryServiceProvider` binds `EloquentRepositoryInterface` to `BaseRepository`, but most code uses concrete repository classes.

Service layer:

- `AttendanceAnalyticsService`: daily/monthly attendance aggregation.
- `ScanAnalyticsService`: daily/monthly actual-vs-expected scan analytics.
- `IncidentService`: incident filtering, export, delete action, CRUD helpers.
- `FileUploadService`: S3 upload wrapper.
- `UserService`: user creation and role/company association helpers.

## Routes And Surfaces

Public web routes:

- `/`: landing page with FAQs.
- `/about`: about page.
- `/faq`: searchable FAQ page.
- `/contact/us`: contact form POST; verifies reCAPTCHA score and sends mail.

Auth/profile routes:

- Breeze routes from `routes/auth.php`.
- `/profile`: edit/update/delete authenticated profile.
- Password and email verification routes are standard Breeze-style.

Admin web routes:

- Prefix/name: `admin.*`.
- Middleware: `auth`, `administrator`, `is_banned`.
- CRUD/resources: companies, sites, users/personnel, tags, scans, attendance, admin users, FAQs, regions.
- Credentials: company owner password changes and admin password changes.
- Dashboard: `admin/dashboard`.

Company-owner web routes:

- Prefix/name: `company.*`.
- Middleware: `auth`, `company_owner`, `is_banned`.
- Dashboard: `company/dashboard`.
- Attendance transactions and analytics.
- Scan transactions and analytics.
- CRUD/resources: users/personnel, tags, sites, regions.

Shared authenticated web routes:

- Incident resource routes are available to authenticated, non-banned users.
- Site credential password/logout PIN changes live under `common.credentials.*`.

Mobile/API routes:

- `POST /api/auth/login`: login with email/password, returns Sanctum token.
- `POST /api/auth/logout`: revoke current token.
- `GET /api/dashboard`: mobile dashboard counts and latest records.
- `GET|POST /api/scans`: list/create scans.
- `GET|POST /api/attendances`: list/create attendance.
- `GET|POST /api/guards`: list/create personnel/security guards.
- `GET|POST /api/incidents`: list/create incidents.
- `POST /api/incidents/multiple`: bulk incident sync.
- `POST /api/upload`: upload image.
- `GET /api/regions/{region}/sites`: sites in a region.
- `GET /api/company/{company}/sites`: sites for a company.
- `GET /api/sites/{site}/tags`: tags for a site.
- `GET /api/sites/{company}`: currently points to `SiteTagController@show` and may be a route naming/parameter mistake.

`php artisan route:list` currently reports 153 routes.

## Query Filtering And Search

The app uses two reusable query mechanisms:

- `SearchableTrait`: models define a `$searchable` array. Calling `->search()` uses request key `searchTerm` by default and supports relation fields such as `user.first_name`.
- `constructPipes()`: sends a query through Laravel's `Pipeline` using filter classes from `app/QueryFilters`.

Common filters include company, site, tag, role, status, date, created date, user/company/industry, first/last name, email, phone, state, region, gender, and attendance action type.

When adding index/export screens, follow the existing pattern:

```php
$query = $repository->modelQuery()->search()->with([...]);
$query = constructPipes($query, [
    new DateFilter('scan_date'),
    CompanyIdFilter::class,
    SiteIdFilter::class,
]);
```

`constructPipes()` validates that each pipe is a `BaseFilter`. If passing an instantiated filter, it must extend `BaseFilter`.

## Analytics

Scan analytics:

- Daily: scan count per site, daily actual vs expected scans, and daily actual vs expected per site.
- Monthly: monthly scan count per site and monthly actual vs expected.
- Expected scans are based on `sites.maximum_number_of_rounds * sites.number_of_tags`.
- Uses PostgreSQL functions like `TO_CHAR` and date grouping.

Attendance analytics:

- Daily: groups by user and attendance date, computing first check-in, last check-out, site, total attendance, and duration.
- Monthly: groups by user/month/year and sums duration.
- Uses PostgreSQL `DATE_TRUNC`.

Exports:

- `ScansExport`: exports scan date/time, tag, site, gap, round, latitude, longitude.
- `AttendanceExport`: exports attendance date/time, action type, site, profile, distance, proximity, latitude, longitude.
- `IncidentExport`: exports reporter, type, region, site, comment, image URL, date, and time.

## File Uploads And Images

- `FileUploadService::uploadToS3()` writes to the configured `s3` disk under `public/storage/{directory}/{timestamp}.{extension}` and returns an object with `url` and `path`.
- On failure it logs and returns `url: null`, `path: null` instead of throwing to callers.
- Some model accessors convert stored paths to URLs:
  - `User::profileImage`
  - `Site::photo`
  - `Attendance::Image`
  - `Incident::Image`
- `UploadFileRequest` expects an `image` file.
- Mobile multiple incident sync expects incident images as strings, not uploaded image files.

## Frontend Structure

The UI is mostly Blade plus Tailwind classes.

- Layouts: `resources/views/layouts/app.blade.php`, `guest.blade.php`, `navigation.blade.php`.
- Blade components: buttons, inputs, modals, dropdowns, filter cards, loader, select/text area inputs.
- Shared partials: header, table, flash messages, image modal.
- Admin views: `resources/views/admin/...`.
- Company views: `resources/views/company/...`.
- Public views: `welcome.blade.php`, `about.blade.php`, `faq.blade.php`, contact form partial.
- Analytics views: `resources/views/scan/analytics/...` and `resources/views/attendance/analytics/...`.
- JS assets in `public/assets/js` provide page behavior such as actions, API helpers, address handling, loader, toggles, and transactions.
- Tailwind theme defines project colors such as `primary_color`, `background_color`, `site`, `tags`, `guards`, `foundation`, and table/status colors.

When changing UI, prefer existing Blade components and theme tokens rather than introducing a new design language.

## Database And Seed Data

Migrations create:

- Lookup tables: `countries`, `states`, `industries`.
- Auth/system tables: `users`, `password_reset_tokens`, `failed_jobs`, `personal_access_tokens`, Spatie permission tables.
- Domain tables: `companies`, `sites`, `regions`, `tags`, `scans`, `attendances`, `incidents`, `frequently_asked_questions`.

Notable schema details:

- Users can have nullable email, username, phone, site, company, region, payroll/shift fields, profile image, and logout PIN.
- Sites have coordinates, shift windows, tag/round expectations, photo, status, and logout PIN.
- Tags are unique by `site_id + code`.
- Scans and attendance store separate date, time, and date_time columns.
- Incidents are created in one migration and populated with real columns in later migrations.
- `regions` migration also adds `region_id` to `users` and `sites`.
- `mobile_sync_id` is unique and nullable on incidents.

Seed/setup behavior:

- `populate:country` reads `public/countriesandstates.json`.
- `populate:industries` inserts a fixed industry list.
- `populate:roles` inserts Spatie roles matching `RoleEnum`.
- `setup:app` creates super admin, admin, company owner, and site inspector users from environment variables.
- In non-production, `setup:app` runs `migrate:fresh` and seeds users, sites, tags, scans, and attendance sample data.

## Testing

The current tests are mostly the default Laravel/Breeze auth/profile/example tests:

- `tests/Feature/Auth/*`
- `tests/Feature/ProfileTest.php`
- `tests/Feature/ExampleTest.php`
- `tests/Unit/ExampleTest.php`

There is little/no custom test coverage for the main PMS domain. For non-trivial changes, add focused feature/unit tests around:

- Role-scoped access.
- Company/site/region visibility.
- Mobile API response shapes.
- Scan/attendance creation and duplicate prevention.
- Export query filtering.
- Analytics grouping.
- Incident bulk sync behavior.

## Coding Conventions

- Follow Laravel conventions and the existing repository/service/controller structure.
- Use FormRequest classes for validation on new write endpoints.
- Keep admin and company-owner controller behavior separate where the current app already separates it.
- Use repositories where adjacent controllers already use repositories.
- Use query filters and `SearchableTrait` for list filtering/search instead of ad hoc repeated query logic.
- Preserve existing route names where views or redirects depend on them.
- Prefer transactions when creating/updating multiple coupled records, especially users plus companies/sites/regions.
- Respect global company scopes; do not remove them casually.
- Use Spatie role assignment (`assignRole`) rather than raw role table writes.
- Preserve spelling of existing columns/files/routes, even when misspelled, unless doing a deliberate migration/refactor.
- Do not change generated/compiled files in `storage/framework/views`.

## Known Sharp Edges

- `routes/web.php` contains the `common.credentials.*` route group twice. Avoid adding a third duplicate.
- `RoleEnum` does not define `SECURITY`, but `User::isSecurity()` references it.
- `app/Http/Resources/IncidentController.php` is unusually named for a resource namespace. Inspect before relying on it.
- Several migrations have misspelled filenames (`coloumns`, `incedents`, `synch`). Do not rename historical migrations after they have run in shared environments.
- `2025_03_02_172130_create_regions_table.php` drops the `regions` table before dropping `region_id` foreign keys in `down()`, which may fail depending on the database.
- `2025_03_08_163418_add_coloumns_to_incidents_table.php` has an empty `down()` body.
- `IncidentExport` maps `attendance_date` and `attendance_time` from incident rows, but incidents do not define those columns in migrations. This likely needs correction before incident exports are trusted.
- Some controllers delete related records manually rather than using database cascade rules.
- `api/sites/{company}` and `api/sites/{site}/tags` both point to `SiteTagController@show`, and the former parameter name is misleading.
- `Company::attendancies()` is misspelled but may be referenced by existing code.
- `User::country()` uses `state_id` as the foreign key to `Country`, which appears incorrect.
- `setup:app` is destructive outside production.
- Docker setup lacks a database service.
- Analytics/export SQL assumes PostgreSQL in important paths.

## Safe Change Checklist

Before editing:

- Check `git status --short`; do not overwrite unrelated user changes.
- Inspect nearby controllers, views, requests, and routes before changing behavior.
- Confirm whether the feature is admin, company-owner, mobile API, or shared.

When changing data access:

- Account for global company scopes.
- Add eager loads used by Blade/export mapping to avoid N+1 issues.
- Keep pagination query parameters such as `per_page`, `searchTerm`, and filter keys working.

When changing writes:

- Update the relevant FormRequest.
- Keep role assignment and linked user/company/site/region records consistent.
- Use transactions for multi-model changes.
- Consider file upload failure behavior.

When changing API responses:

- Preserve existing JSON status conventions unless intentionally migrating them.
- Mobile clients may rely on field names such as `security_guard_id`, `tag_code`, `mobile_sync_id`, `scan_date_time`, and `attendance_date_time`.

When done:

- Run the smallest relevant test set.
- Run `php artisan route:list` if routes changed.
- Run `npm run build` if frontend assets changed.
- Mention any tests you could not run.
