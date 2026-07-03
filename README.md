# Project Operations Portal

Project Operations Portal is a Laravel 13 + Filament 5 construction operations platform for a Nigerian real-estate and building company.

It now has two working sides:

- `Admin panel`: manage clients, projects, funding plans, construction updates, selections, payments, procurement, legal documents, and risk decisions.
- `Client portal`: clients log in to track project progress, see construction updates, review finance decisions, view payments, and submit finish or scope choices.

## Stack

- Laravel 13
- Filament 5
- PHP 8.4
- MySQL on `127.0.0.1:3306`
- Database: MySQL

## Run

```bash
composer install
npm install
php artisan migrate:fresh --seed
npm run build
php artisan serve --host=127.0.0.1 --port=8001
```

## URLs

- Admin: `http://127.0.0.1:8001/admin/login`
- Client: `http://127.0.0.1:8001/client/login`

## Production Notes

- Set `APP_ENV=production`
- Set `APP_DEBUG=false`
- Set `APP_URL` to your live domain
- Set the real MySQL credentials in `.env`
- Keep `APP_TIMEZONE=Africa/Lagos`
- Run `php artisan migrate --force`
- Only run `php artisan db:seed --force` in production if you want the admin user created automatically
- In production, the seeder now skips demo clients, demo projects, and demo finance data
- Run `php artisan storage:link` if you later add file uploads
- Run `php artisan optimize` after deployment

## Login

```text
Admin
Email: admin@gmail.com
Password: 12345678
```

```text
Client 1
Email: amina.yusuf@gmail.com
Password: 12345678
```

```text
Client 2
Email: chinedu.okafor@gmail.com
Password: 12345678
```

```text
Client 3
Email: zainab.bello@gmail.com
Password: 12345678
```

## What The App Does

- Tracks construction projects from registration to completion.
- Handles contractor-led financing and client payment plan decisions.
- Lets the company publish visible project updates to clients.
- Lets clients submit finish choices, fittings, and other scope decisions.
- Records payments, procurement, legal paperwork, and audit activity.
- Shows simple risk guidance for whether a project or client finance setup looks low, medium, or high risk.

## What To Test Tonight

1. Log in as `admin@gmail.com` and open the dashboard.
2. Check `Projects`, `Project Updates`, `Client Selections`, `Investments`, and `Risk Assessments`.
3. Create a new project and confirm it returns to the index list after save.
4. Edit an investment and confirm the payable amount and monthly contribution are recalculated automatically.
5. Add a project update with `Show in client portal` enabled.
6. Log in as `amina.yusuf@gmail.com` and confirm you can see only that client's projects and updates.
7. In the client portal, open `Finish Choices` and submit a new choice.
8. In the client portal, open `Finance Preferences` and update the payment preference on a record with status `proposed` or `countered`.
9. Go back to admin and confirm the client-submitted selection and finance preference changes are visible there.

## Notes

- The legacy Blade starter has been removed from the active workflow.
- Seed data uses Nigerian names, locations, and payment context.
- The current product direction is inspired by common construction portal patterns such as owner/client updates, selections, and financing visibility used in platforms like Buildertrend, CoConstruct, and Procore.
