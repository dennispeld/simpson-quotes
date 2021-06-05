<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_users()
    {
        $response = User::all();

        // how many users are there in the database
        $this->assertCount(5, $response);
    }

    public function test_quotes_by_user()
    {
        $response = $this->getJson('/api/user/2');

        $expectedJson = [
            "quotes" => [
                [
                    "user" => "Homer Simpson",
                    "quotation" => "D'oh!"
                ]
            ]
        ];

        // we wan to compare the exact json response
        $response->assertExactJson($expectedJson);
    }

    public function test_add_new_quote()
    {
        $this->postJson('/api/user', ['user_id' => 1, 'quotation' => 'Hello world!']);

        //get quotes of user 1
        $response = $this->getJson('/api/user/1');

        // let's see if the new quotation was added
        $response->assertJsonFragment(['Hello world!']);
    }

    
}
