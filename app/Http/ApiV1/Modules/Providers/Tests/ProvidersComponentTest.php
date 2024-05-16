<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/providers 201', function () {
    postJson('/api/v1/providers')
        ->assertStatus(201);
});

test('POST /api/v1/providers 400', function () {
    postJson('/api/v1/providers')
        ->assertStatus(400);
});

test('GET /api/v1/providers/{id} 200', function () {
    getJson('/api/v1/providers/{id}')
        ->assertStatus(200);
});

test('GET /api/v1/providers/{id} 404', function () {
    getJson('/api/v1/providers/{id}')
        ->assertStatus(404);
});
    
test('GET /api/v1/providers 200', function () {
    getJson('/api/v1/providers')
        ->assertStatus(200);
});

test('GET /api/v1/providers 404', function () {
    getJson('/api/v1/providers')
        ->assertStatus(404);
});
    
test('GET /api/v1/providers/{id}/items 200', function () {
    getJson('/api/v1/providers/{id}/items')
        ->assertStatus(200);
});

test('GET /api/v1/providers/{id}/items 404', function () {
    getJson('/api/v1/providers/{id}/items')
        ->assertStatus(404);
});
