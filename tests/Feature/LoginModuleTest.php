<?php
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\postJson;

beforeEach(function ()
{
    $this->user = User::first();
});

afterAll(function ()
{
    unset ($this->user);
});

it("should get a 200 HTTP status on login with valid credentials and the user data should be returned with the auth token", function ()
{
    $response = postJson(route("api.login"), [
        'email' => $this->user->email,
        'password' => "password",
    ]);

    expect($response->getStatusCode())
        ->toBe(Response::HTTP_OK)
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
});

it("should get a 422 HTTP status on login with an empty email and validation error messages should be returned rather than the user data", function ()
{
    $response = postJson(route("api.login"), [
        'email' => "",
        'password' => "password",
    ]);

    expect($response->getStatusCode())
        ->toBe(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->and($response->getContent())
        ->toBeJson()
        ->and($response->assertJsonStructure([
            "message",
            "errors" => [
                "email" => [],
            ],
        ]));
});

it("should get a 422 HTTP status on login with an empty password and validation error messages should be returned rather than the user data", function ()
{
    $response = postJson(route("api.login"), [
        'email' => $this->user->email,
        'password' => "",
    ]);

    expect($response->getStatusCode())
        ->toBe(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->and($response->getContent())
        ->toBeJson()
        ->and($response->assertJsonStructure([
            "message",
            "errors" => [
                "password" => [],
            ],
        ]));
});

it("should get a 422 HTTP status on login with invalid credentials and validation error messages should be returned rather than the user data", function ()
{
    $response = postJson(route("api.login"), [
        'email' => $this->user->email,
        'password' => "password1",
    ]);

    expect($response->getStatusCode())
        ->toBe(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->and($response->getContent())
        ->toBeJson()
        ->and($response->assertJsonStructure([
            "message",
            "errors" => [],
        ]));
});