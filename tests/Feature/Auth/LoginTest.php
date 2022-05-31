<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function pest\Laravel\get;
use function pest\Laravel\post;




uses(RefreshDatabase::class);





it('can display login page')->get('auth/login')  ->assertStatus(200);

test('login form has email and password field and a submit button')
->get('auth/login')
->assertSeeText(['Email','Password','Submit']);

it('throws errors if inputs are empty',function(){


       $this ->post('/login',['email','password'])
        ->assertSessionHasErrors(['email', 'password']);
});



it('redirects logged in users', function(){

    $user=User::factory()->create();
   actingAs($user)
    ->get('auth/login')
    ->assertStatus(302);

});



test('user can log in', function(){
    $user=User::factory()->create([
        'email'=>'test@ok.com',
        'password'=>bcrypt('testpasswordisok')
    ]);

    post('/login',[
        'email'=>'test@ok.com',
        'password'=>'testpasswordisok'
    ])
    ->assertRedirect('/');

    $this->assertAuthenticated();

});





it('is a HoT for user login')->tap(function(){
    $user=User::factory()->create();

    post('/login',[
        'email'=>$user->email,
        'password'=>'password'
    ])
    ->assertRedirect('/');

    $this->assertAuthenticated();

});


/**custom assertion example */
// it('is Admin',function(){
//     expect('Admin')->toBeAdmin();
// });



it('redirects authenticated user', function () {
    expect(User::factory()->create())->toBeRedirectedFor('/auth/login');
});
