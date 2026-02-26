<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
Aula Coding Task - Book & Author API

This project is a simplified RESTful API for managing a collection of books and authors, built using Laravel 12 and MariaDB. It allows creating, reading, updating, and deleting authors and books, with many-to-many relationships between them.

📦 Requirements

PHP >= 8.5

Composer

MariaDB / MySQL


⚙️ Setup Instructions

Follow these steps to get the project up and running locally:

Clone the repository

git clone <your-repo-url>
cd aula_coding_task

Install dependencies

composer install

Copy the environment file

cp .env.example .env

Configure the database connection in .env

Set your MariaDB/MySQL credentials:

DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aula_coding_task
DB_USERNAME=root
DB_PASSWORD=

Generate the application key

php artisan key:generate

Run database migrations

This will create all tables (authors, books, author_book, migrations):

php artisan migrate

(Optional) Seed the database with fake data

php artisan db:seed
🚀 Running the Application

Start the local development server:

php artisan serve

By default, the API will be accessible at:

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
⚡ Notes

All API responses are in JSON format.

Validation is applied to required fields (e.g., first_name, last_name, title, authors, published_year).

Relationships between books and authors are handled via a many-to-many pivot table (author_book).

📝 Git Workflow Suggestion

Commit after each logical step:

Migrations created

Models created

Controllers + CRUD implemented

Routes added

Factories + Seeders implemented

README updated

🔒 License

This project is open-sourced software licensed under the MIT license
.

Se vuoi, posso anche prepararti una versione ancora più breve e “user-friendly” da usare per il recruiter, dove è tutto ridotto ai comandi principali e ai dettagli essenziali per testare le API in Postman.