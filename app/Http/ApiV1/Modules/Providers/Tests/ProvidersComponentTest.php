<?php

use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/providers 201', function () {
    $request = [
        'company' => 'Test company'
    ];
    

    postJson('/api/v1/providers', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.company', $request['company'])
        ->assertJsonPath('data.exists_count', 0);
});

test('POST /api/v1/providers 500', function () {
    $request = [
        'awd' => 'awd'
    ];
    

    postJson('/api/v1/providers', $request)
        ->assertStatus(500);
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
   
test('GET /api/v1/providers 200', function () {
    getJson('/api/v1/providers')
        ->assertStatus(200);
});
   
test('GET /api/v1/providers/{id}/items 200', function () {
    $provider = \App\Domain\Providers\Models\Provider::factory()->create();

    getJson("/api/v1/providers/{$provider->id}/items")
        ->assertStatus(200);
});
