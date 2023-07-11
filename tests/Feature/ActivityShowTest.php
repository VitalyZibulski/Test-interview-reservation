<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityShowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_view_activity_page()
    {
        $activity = Activity::factory()->create();

        $response = $this->get(route('activity.show', $activity));

        $response->assertOk();
    }

    public function test_gets_404_for_unexisting_activity()
    {
        $response = $this->get(route('activity.show', 69));

        $response->assertNotFound();
    }
}
