<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/items 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    
    $request1 = [
        'provider_id' => $provider->id,
        'title' => 'Test title',
        'body' => 'Test body',
        'price' => 1000,
        'discount' => 10
    ];
    postJson('/api/v1/items', $request1);
    
    $request2 = [
        'provider_id' => $provider->id,
        'title' => 'Test title2',
        'body' => 'Test body2',
        'price' => 1002,
        'discount' => 12
    ];
    postJson('/api/v1/items', $request2);
    
    $this->skipNextOpenApiResponseValidation()->getJson('/api/v1/items')
        ->assertStatus(200);
});

test('GET /api/v1/items 404', function () {
    getJson('/api/v1/items')
        ->assertStatus(404);
});

test('POST /api/v1/items 201', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $request = [
        'provider_id' => $provider->id,
        'title' => 'Test title',
        'body' => 'Test body',
        'price' => 1000,
        'discount' => 10
    ];
    
    postJson('/api/v1/items', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.provider_id', $request['provider_id'])
        ->assertJsonPath('data.title', $request['title'])
        ->assertJsonPath('data.body', $request['body'])
        ->assertJsonPath('data.price', $request['price'])
        ->assertJsonPath('data.discount', $request['discount'])
        ->assertJsonPath('data.status', 'EXISTS');
});

test('GET /api/v1/items/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $request = [
        'provider_id' => $provider->id,
        'title' => 'Test title',
        'body' => 'Test body',
        'price' => 1000,
        'discount' => 10
    ];
    $response = postJson('/api/v1/items', $request)
        ->assertStatus(201);
    
    getJson('/api/v1/items/'.$response->json('data')['id'])
        ->assertStatus(200)
        ->assertJsonPath('data.provider_id', $request['provider_id'])
        ->assertJsonPath('data.title', $request['title'])
        ->assertJsonPath('data.body', $request['body'])
        ->assertJsonPath('data.price', $request['price'])
        ->assertJsonPath('data.discount', $request['discount'])
        ->assertJsonPath('data.status', 'EXISTS');
});

test('GET /api/v1/items/{id} 404', function () {
    getJson('/api/v1/items/124')
        ->assertStatus(404);
});

test('PUT /api/v1/items/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $request1 = [
        'provider_id' => $provider->id,
        'title' => 'Test title',
        'body' => 'Test body',
        'price' => 1000,
        'discount' => 10
    ];
    $response = postJson('/api/v1/items', $request1)
        ->assertStatus(201);
        
    $request2 = [
        'title' => 'Test title2',
        'body' => 'Test body2',
        'price' => 1002,
        'discount' => 12
    ];
    
    putJson('/api/v1/items/'.$response->json('data')['id'], $request2)
        ->assertStatus(200)
        ->assertJsonPath('data.provider_id', $request1['provider_id'])
        ->assertJsonPath('data.title', $request2['title'])
        ->assertJsonPath('data.body', $request2['body'])
        ->assertJsonPath('data.price', $request2['price'])
        ->assertJsonPath('data.discount', $request2['discount'])
        ->assertJsonPath('data.status', 'EXISTS');
});

test('PUT /api/v1/items/{id} 404', function () {
    putJson('/api/v1/items/141')
        ->assertStatus(404);
});

test('DELETE /api/v1/items/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $request = [
        'provider_id' => $provider->id,
        'title' => 'Test title',
        'body' => 'Test body',
        'price' => 1000,
        'discount' => 10
    ];
    $response = postJson('/api/v1/items', $request)
        ->assertStatus(201);
        
    deleteJson('/api/v1/items/'.$response->json('data')['id'])
        ->assertStatus(200);
});

test('DELETE /api/v1/items/{id} 404', function () {
    deleteJson('/api/v1/items/234')
        ->assertStatus(404);
});
