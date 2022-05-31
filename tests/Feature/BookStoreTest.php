<?php
use App\Models\User;
use function pest\Laravel\get;
use function pest\Laravel\post;
use function pest\Laravel\assertDatabaseHas;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create();
});




it('only allows auth user to store books')
->post('/books')->assertStatus(302);


it('creates a book',function(){
    $user=User::factory()->create();
    $this->actingAs($user)
    ->post('/books',[
        'title'=>'hello',
        'author'=>'hi',
        'status'=>'WANT_TO_READ'
    ]);

    $this->assertDatabaseHas('books',[
        'title'=>'hello',
        'author'=>'hi'

    ])
    ->assertDatabaseHas('book_user',[
        'user_id'=> $user->id,
        'status'=>'WANT_TO_READ'

    ]);


});
test('book store validation test')
->tap(fn()=>$this->actingAs($this->user)
    ->post('/books')
    ->assertSessionHasErrors([
        'title','author','status'
    ])

    );




