<?php
use App\Models\User;

use function Pest\Laravel\getJson;
use function Pest\Laravel\json;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;

beforeEach(function ()
{
    $this->user = User::factory()->create();
    $this->token = $this->user->createToken("auth_token")->plainTextToken;
});

test("if the login will be successfull, returning the expected data structure", function ()
{
    post(route('api.login'), [
        'email' => $this->user->email,
        'password' => "password",
    ])->assertJsonStructure([
                "user" => [
                    "code",
                    "name",
                    "email",
                    "email_verified_at",
                    "created_at",
                    "updated_at",
                    "deleted_at",
                ],
                "token",
            ])->assertOk();
});

test("if login fails with incorrect credentials", function ()
{
    json("POST", route('api.login'), [
        'email' => $this->user->email,
        'password' => "password1",
    ])->assertUnprocessable();
});