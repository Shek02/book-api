<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_book(): void
    {
        // creo un autore
        $author = Author::create([
            'first_name' => 'Jane',
            'last_name' => 'Austen',
        ]);

        // creo un libro collegato all'autore
        $response = $this->postJson('/api/books', [
            'title' => 'Pride and Prejudice',
            'published_year' => 1813,
            'genre' => 'Romance',
            'authors' => [$author->id],
        ]);

        $response->assertStatus(201);

        // controllo che il DB contenga il libro
        $this->assertDatabaseHas('books', [
            'title' => 'Pride and Prejudice',
            'published_year' => 1813,
            'genre' => 'Romance',
        ]);

        // controllo che la relazione autore-libro sia salvata
        $bookId = $response->json('id');
        $this->assertDatabaseHas('author_book', [
            'author_id' => $author->id,
            'book_id' => $bookId,
        ]);
    }

    public function test_cannot_create_book_without_title(): void
    {
        $author = Author::create([
            'first_name' => 'Mark',
            'last_name' => 'Twain',
        ]);

        // invio richiesta senza title
        $response = $this->postJson('/api/books', [
            'published_year' => 1884,
            'genre' => 'Adventure',
            'authors' => [$author->id],
        ]);

        // 422 = unprocessable entity
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('title');
    }

    public function test_can_show_book(): void
    {
        $author = Author::create([
            'first_name' => 'Leo',
            'last_name' => 'Tolstoy',
        ]);

        $book = Book::create([
            'title' => 'War and Peace',
            'published_year' => 1869,
            'genre' => 'Historical',
        ]);

        $book->authors()->attach($author->id);

        $response = $this->getJson("/api/books/{$book->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'title' => 'War and Peace',
                     'published_year' => 1869,
                     'genre' => 'Historical',
                 ])
                 ->assertJsonFragment([
                     'first_name' => 'Leo',
                     'last_name' => 'Tolstoy',
                 ]);
    }
}