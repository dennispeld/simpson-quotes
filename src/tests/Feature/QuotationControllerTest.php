<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuotationControllerTest extends TestCase
{
    public function test_quotes_by_user()
    {
        $response = $this->getJson('/api/user/2/quotes');

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
        $this->postJson('/api/user/quote', ['user_id' => 1, 'quotation' => 'Hello world!']);

        //get quotes of user 1
        $response = $this->getJson('/api/user/1/quotes');

        // let's see if the new quotation was added
        $response->assertJsonFragment(['Hello world!']);
    }
}
