<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

/*test('POST /api/v1/items 201', function () {
    postJson('/api/v1/items')
        ->assertStatus(201);
});

test('POST /api/v1/items 400', function () {
    postJson('/api/v1/items')
        ->assertStatus(400);
});

test('GET /api/v1/items/{id} 200', function () {
    //$provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $item = \App\Domain\Items\Models\Item::factory()->create();

    getJson('/api/v1/items/'. $item->id)
        ->assertStatus(200)
        ->assertJsonPath('data.provider_id', $item->provider_id)
        ->assertJsonPath('data.title', $item->title)
        ->assertJsonPath('data.body', $item->body)
        ->assertJsonPath('data.price', $item->price)
        ->assertJsonPath('data.discount', $item->discount)
        ->assertJsonPath('data.status', $item->status);
});

test('GET /api/v1/items/{id} 404', function () {
    getJson('/api/v1/items/{id}')
        ->assertStatus(404);
});

test('PUT /api/v1/items/{id} 200', function () {
    putJson('/api/v1/items/{id}')
        ->assertStatus(200);
});

test('PUT /api/v1/items/{id} 400', function () {
    putJson('/api/v1/items/{id}')
        ->assertStatus(400);
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
