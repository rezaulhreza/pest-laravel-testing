<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function pest\Laravel\get;



uses(RefreshDatabase::class);


test('Show Login  Link and hide auth link if user is not signed in', function () {


    get('/')
 
    ->assertSee('Login')
    ->assertDontSee(['Feed','My Books','Logout','Friends','Add A Book'])
    ;
});


test('Show authenticated text and link if user is  signed in', function () {

    $user=User::factory()->create();
    $this->actingAs($user)
    ->get('/')
    ->assertDontSee(['Login','Register'])
    ->assertSeeText(['Feed','My Books','Logout','Friends','Add A Book',$user->name]);

});

