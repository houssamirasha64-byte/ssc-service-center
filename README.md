# Repair Service Center – Web System

A PHP and MySQL web application for tracking machine repairs and deliveries at a service center. Staff log incoming machines, follow them through repair and delivery, and search the records.

## Features

- **Login:** usernames and passwords are checked against the `users` table. Passwords are stored as bcrypt hashes. Every page checks the session and redirects to the login page if the user isn't logged in.
- **Roles:** admins can add, edit and delete employee accounts, and can edit or delete machines. Normal users can't open the admin pages.
- **Dashboard:** lists machines that are pending repair, with a button to mark each one repaired. Separate pages show repaired, pending delivery and delivered machines.
- **Add machine:** a form for customer name, model (drop-down), serial number, fault description and status. Required fields are checked in the browser.
- **Status flow:** Pending Repair → Repaired → Pending Delivery → Delivered, using the buttons on each row.
- **Search:** search by customer name, serial number, model, fault description, dates, status or ID.
- **Front-end extras:** form validation, a loading indicator and notifications (JavaScript).

## Project structure

| Path | Purpose |
|------|---------|
| `index.php` | Dashboard of pending repair machines |
| `system_login.php`, `logout.php` | Login and logout |
| `add_machine.php`, `edit.php` | Add and edit machines |
| `repaired.php`, `pending_delivery.php`, `delivered.php` | Machines by status |
| `search.php` | Global search |
| `admin_employees.php`, `admin_edit_employee.php` | Admin: manage employee accounts |
| `phpp/` | Server-side handlers and the database connection (`connect.php`) |
| `assets/js/` | Form validation, loader and notifications |
| `style.css` | Styling |
| `repair_service.sql` | Database schema and sample data |

## Setup

1. Install a local stack with PHP, MySQL or MariaDB, for example XAMPP.
2. Copy this folder into the web root, for example `htdocs/repair_service`.
3. Import `repair_service.sql` into MySQL, for example through phpMyAdmin. This creates the `repair_service` database with the `machines` and `users` tables.
4. Check `phpp/connect.php` for the database host, user and password. The defaults are for a local setup: `127.0.0.1`, user `root`, empty password.
5. Open `http://localhost/repair_service/system_login.php` in a browser.

