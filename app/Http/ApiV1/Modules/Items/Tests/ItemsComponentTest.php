<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');
/*
test('GET /api/v1/items 200', function () {
    getJson('/api/v1/items')
        ->assertStatus(200);
});

test('GET /api/v1/items 404', function () {
    getJson('/api/v1/items')
        ->assertStatus(404);
});

test('POST /api/v1/items 201', function () {
    postJson('/api/v1/items')
        ->assertStatus(201);
});

test('GET /api/v1/items/{id} 200', function () {
    getJson('/api/v1/items/{id}')
        ->assertStatus(200);
});

test('GET /api/v1/items/{id} 404', function () {
    getJson('/api/v1/items/{id}')
        ->assertStatus(404);
});

test('PUT /api/v1/items/{id} 200', function () {
    putJson('/api/v1/items/{id}')
        ->assertStatus(200);
});

test('PUT /api/v1/items/{id} 404', function () {
    putJson('/api/v1/items/{id}')
        ->assertStatus(404);
});

test('DELETE /api/v1/items/{id} 200', function () {
    deleteJson('/api/v1/items/{id}')
        ->assertStatus(200);
});

test('DELETE /api/v1/items/{id} 404', function () {
    deleteJson('/api/v1/items/{id}')
        ->assertStatus(404);
});*/
