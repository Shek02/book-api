<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase; // reset the DB at each test

    public function test_can_create_author(): void
    {
        $response = $this->postJson('/api/authors', [
            'first_name' => 'John',
            'last_name'  => 'Doe',
        ]);

        // Check that the status is 201 (creation OK)
        $response->assertStatus(201);

        // Check that the DB contains the newly created author
        $this->assertDatabaseHas('authors', [
            'first_name' => 'John',
            'last_name'  => 'Doe',
        ]);
    }
}