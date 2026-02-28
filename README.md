<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
Aula Coding Task - Book & Author API

Simplified RESTful API for managing books and authors, built with Laravel 12 and MariaDB. Supports CRUD operations and many-to-many relationships.

📦 Requirements

PHP >= 8.5

Composer

MariaDB / MySQL

⚙️ Setup Instructions
1. Clone repository
git clone <your-repo-url>
cd aula_coding_task
2. Install dependencies
composer install
3. Configure environment
cp .env.example .env

Set your MariaDB credentials in .env:

DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aula_coding_task
DB_USERNAME=root
DB_PASSWORD=
4. Generate application key
php artisan key:generate
🛠️ Database Initialization

You have two options:

Option 1: Laravel migrations (recommended)
php artisan migrate
Option 2: SQL scripts via Composer

Drop existing tables:

composer db:drop

Initialize tables:

composer db:init
Optionally, seed fake data:
php artisan db:seed
🚀 Running the Application
php artisan serve

Default URL:

http://127.0.0.1:8000
🔗 API Endpoints

All endpoints are prefixed with /api.

Authors
Method	Endpoint	Description
GET	/api/authors	List all authors
POST	/api/authors	Create a new author
GET	/api/authors/{id}	Get a single author
PUT	/api/authors/{id}	Update an author
DELETE	/api/authors/{id}	Delete an author

Example POST body:

{
    "first_name": "John",
    "last_name": "Doe"
}
Books
Method	Endpoint	Description
GET	/api/books	List all books
POST	/api/books	Create a new book
GET	/api/books/{id}	Get a single book
PUT	/api/books/{id}	Update a book
DELETE	/api/books/{id}	Delete a book

Example POST body:

{
    "title": "The Great Book",
    "authors": [1, 2],
    "published_year": 2021,
    "genre": "Fiction"
}
✅ Running Tests

Tests are included for Authors and Books. To run all tests:

php artisan test
⚡ Useful Commands
Command	Purpose
composer db:drop	Drop all tables (via SQL script)
composer db:init	Initialize tables (via SQL script)
php artisan migrate	Run Laravel migrations
php artisan db:seed	Seed database with fake data
php artisan test	Run automated tests for API
php artisan serve	Start local dev server
📝 Notes

All responses are JSON.

Validation ensures required fields are filled (first_name, last_name, title, authors, published_year).

Books ↔ Authors handled via pivot table author_book.

Tests cover creation, validation, and basic read operations.

🔒 License

Open-source MIT license.