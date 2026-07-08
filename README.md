# AutoHub

A multipage car dealership website built with Bootstrap, PHP, and MySQL.

## Pages

- **Home** — hero, featured cars, and highlights
- **Inventory** — all cars with filters (make, body type, max price, search)
- **Car detail** — full specs and an enquiry form for each car
- **About** — the dealership story
- **Contact** — an enquiry form

## Features

- Multipage layout with shared header/footer includes
- Dynamic listings and detail pages from the database
- Filtering and search on the inventory page
- Enquiries saved to the database
- Responsive Bootstrap layout

## Built With

- PHP (PDO, prepared statements)
- MySQL / MariaDB
- Bootstrap 5 &amp; Bootstrap Icons
- Custom CSS

## Setup

1. Import `database.sql` into MySQL — it creates the `autohub` database, tables, and sample cars.
2. Adjust the credentials in `includes/db.php` if needed.
3. Serve the folder with PHP (e.g. XAMPP) and open `http://localhost/autohub/`.

## Structure

```
autohub/
├── index.php          # home
├── inventory.php      # listings + filters
├── car.php            # car detail + enquiry
├── about.php
├── contact.php
├── includes/          # db, functions, header, footer, car card
├── images/            # car photos
├── style.css
└── database.sql
```

## Author

Jesse Kiplagat
