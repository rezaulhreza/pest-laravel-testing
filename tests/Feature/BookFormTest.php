<?php

use App\Models\BookUser;
use App\Models\User;
use function pest\Laravel\get;
use function pest\Laravel\post;
use function pest\Laravel\assertDatabaseHas;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function(){
    $this->user = User::factory()->create();
});

test('only auth users can see the book form')
->get('/books')->assertStatus(302);


it('has title and author and a submit button')

->tap(fn()=>$this->actingAs($this->user)
->get('/books/create')
->assertSeeText(['Title','Author','Submit'])

    );

it('shows the statuses in the form')
    ->tap(fn()=>$this->actingAs($this->user)
        ->get('/books/create')
        ->assertSeeTextInOrder(BookUser::$statuses)

        );


