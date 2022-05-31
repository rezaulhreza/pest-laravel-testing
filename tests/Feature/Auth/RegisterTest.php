<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function pest\Laravel\get;
use function pest\Laravel\post;




uses(RefreshDatabase::class);





it('can display register page')->get('/auth/register')  ->assertStatus(200);


it('has errors when fields are left empty') ->post('register')
    ->assertSessionHasErrors(['name','email','password']);



it('can register user successfully')

->tap(fn () => $this->post('/register', [
    'name' => 'Test',
    'email' => 'test@test.com',
    'password' => 'test1234'
])
->assertRedirect('/'))
->assertDatabaseHas('users', [
    'email' => 'test@test.com',
])
->assertAuthenticated();



it('redirects authenticated user', function () {
    expect(User::factory()->create())->toBeRedirectedWhenLoggedIn('/auth/register');
});


