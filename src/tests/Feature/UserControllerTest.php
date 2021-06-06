<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_users_count()
    {
        $response = User::all();

        $this->assertCount(5, $response);
    }
}
