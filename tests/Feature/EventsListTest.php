<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsListTest extends TestCase
{
    use RefreshDatabase;

    public function test_events_list_returns_paginated_data_correctly(): void
    {
        Event::factory(16)->create(['is_public' => true]);

        $response = $this->get('/api/v1/events');
        $response->assertStatus(200);
        $response->assertJsonCount(15, 'data');
        $response->assertJsonPath('meta.last_page', 2);
    }
    
    public function test_events_list_shows_only_public_records(): void
    {
        $publicEvent = Event::factory()->create(['is_public' => true]);
        Event::factory()->create(['is_public' => false]);

        $response = $this->get('/api/v1/events');
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonPath('data.0.name', $publicEvent->name);
    }
}
