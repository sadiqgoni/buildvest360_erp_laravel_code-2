# BuildVest 360 ERP Laravel Code

This is a Laravel starter codebase for a Construction Investment, Procurement, Project Management, Finance Control, Legal and Client Transparency Platform.

## Included Modules
- Dashboard
- Client registration and client portal
- Project registration and project management
- Measurement verification: client input vs engineer verification
- Material responsibility matrix
- Investment proposal and profit percentage approval
- Finance control and repayment tracking
- Procurement management
- Supplier management
- Purchase requisitions
- Purchase orders
- Inventory
- Legal portal
- Legal agreements and default notices
- Audit trail

## Installation
Create a fresh Laravel project:

```bash
composer create-project laravel/laravel buildvest360
cd buildvest360
```

Copy these folders into the Laravel project:
- app
- database
- resources
- routes

Configure `.env`:

```env
DB_DATABASE=buildvest360
DB_USERNAME=root
DB_PASSWORD=
```

Run:

```bash
php artisan migrate
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## Production Requirements
Before live use, add:
- Laravel Breeze/Jetstream authentication
- Role permissions
- Secure file upload
- Payment gateway
- Email/SMS notification
- PDF generation
- Legal review
- Security testing
