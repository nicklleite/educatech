<?php
use App\Models\User;

use function Pest\Laravel\postJson;

it("should get a 200 HTTP status on login with valid credentials and the user data should be returned with the auth token", function ()
{
    $user = User::factory()->create();

    $response = postJson(route("api.login"), [
        'email' => $user->email,
        'password' => "password",
    ]);

    expect($response->getStatusCode())
        ->toBe(200)
        ->and($response->getContent())
        ->toBeJson()
        ->and($response->assertJsonStructure([
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
        ]));
    // TODO arrumar um jeito de criar um usuário temporário, que não atrapalhe os índices da tabela
    $user->forceDelete();
});

// it("should get a 422 HTTP status on login with an empty email and validation error messages should be returned rather than the user data", function ()
// {
//     $response = postJson(route("api.login"), [
//         'email' => "",
//         'password' => "password",
//     ]);

//     expect($response->getStatusCode())
//         ->toBe(422)
//         ->and($response->getContent())
//         ->toBeJson()
//         ->and($response->assertJsonStructure([
//             "message",
//             "errors" => [
//                 "email" => [],
//             ],
//         ]));
// });

// it("should get a 422 HTTP status on login with an empty password and validation error messages should be returned rather than the user data", function ()
// {
//     $response = postJson(route("api.login"), [
//         'email' => $this->user->email,
//         'password' => "",
//     ]);

//     expect($response->getStatusCode())
//         ->toBe(422)
//         ->and($response->getContent())
//         ->toBeJson()
//         ->and($response->assertJsonStructure([
//             "message",
//             "errors" => [
//                 "password" => [],
//             ],
//         ]));
// });

// it("should get a 422 HTTP status on login with invalid credentials and validation error messages should be returned rather than the user data", function ()
// {
//     $response = postJson(route("api.login"), [
//         'email' => $this->user->email,
//         'password' => "password1",
//     ]);

//     expect($response->getStatusCode())
//         ->toBe(422)
//         ->and($response->getContent())
//         ->toBeJson()
//         ->and($response->assertJsonStructure([
//             "message",
//             "errors" => [],
//         ]));
// });