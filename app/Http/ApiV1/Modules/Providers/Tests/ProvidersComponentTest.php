<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/providers 200', function () {
    $provider1 = \App\Domain\Providers\Models\Provider::factory()->create();
    $provider2 = \App\Domain\Providers\Models\Provider::factory()->create();

    $this->skipNextOpenApiResponseValidation()->getJson('/api/v1/providers')
        ->assertStatus(200);
});

test('GET /api/v1/providers 404', function () {
    getJson('/api/v1/providers')
        ->assertStatus(404);
});

test('POST /api/v1/providers 201', function () {
    $request = [
        'company' => 'Test company'
    ];

    postJson('/api/v1/providers', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.company', $request['company'])
        ->assertJsonPath('data.exists_count', 0);
});

test('GET /api/v1/providers/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();

    getJson("/api/v1/providers/{$provider->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.company', $provider->company)
        ->assertJsonPath('data.exists_count', $provider->exists_count);
});

test('GET /api/v1/providers/{id} 404', function () {
    getJson('/api/v1/providers/235')
        ->assertStatus(404);
});

test('PUT /api/v1/providers/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();
    $request = [
        'company' => 'Test company'
    ];
    
    putJson('/api/v1/providers/'.$provider->id, $request)
        ->assertStatus(200)
        ->assertJsonPath('data.company', $request['company']);
});

test('PUT /api/v1/providers/{id} 404', function () {
    $request = [
        'company' => 'Test company'
    ];
    
    putJson('/api/v1/providers/131', $request)
        ->assertStatus(404);
});

test('DELETE /api/v1/providers/{id} 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();

    deleteJson('/api/v1/providers/'.$provider->id)
        ->assertStatus(200);
});

test('DELETE /api/v1/providers/{id} 404', function () {
    deleteJson('/api/v1/providers/134')
        ->assertStatus(404);
});

test('GET /api/v1/providers/{id}/items 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();

    getJson("/api/v1/providers/{$provider->id}/items")
        ->assertStatus(200);
});

test('GET /api/v1/providers/{id}/items 404', function () {
    getJson('/api/v1/providers/243/items')
        ->assertStatus(404);
});
