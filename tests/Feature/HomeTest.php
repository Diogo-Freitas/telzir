<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Plan;
use App\Models\Rate;
use App\Models\DirectDistanceDialing;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_screen_returns_call_cost_correctly()
    {
        $plan = Plan::factory()->create([
            'free_time' => 60,
        ]);

        $rate = Rate::factory()->create([
            'value' => 1.7
        ]);

        $route = route('home', [
            'source' => $rate->source_code_id,
            'destination' => $rate->destination_code_id,
            'time' => 80,
            'plan' => $plan->id,
        ]);

        $response = $this->get($route);

        $response->assertStatus(200);
        $response->assertSee('37,40');
        $response->assertSee('136,00');
    }

    public function test_home_screen_returns_call_cost_correctly_with_free_time()
    {
        $plan = Plan::factory()->create([
            'free_time' => 30,
        ]);

        $rate = Rate::factory()->create([
            'value' => 1.9
        ]);

        $route = route('home', [
            'source' => $rate->source_code_id,
            'destination' => $rate->destination_code_id,
            'time' => 20,
            'plan' => $plan->id,
        ]);

        $response = $this->get($route);

        $response->assertStatus(200);
        $response->assertSee('0,00');
        $response->assertSee('38,00');
    }

    public function test_home_screen_returns_call_cost_unavailable_when_no_rate_found()
    {
        $plan = Plan::factory()->create();

        $source_code = DirectDistanceDialing::factory()->create();

        $destination_code = DirectDistanceDialing::factory()->create();

        $route = route('home', [
            'source' => $source_code->id,
            'destination' => $destination_code->id,
            'time' => 100,
            'plan' => $plan->id,
        ]);

        $response = $this->get($route);

        $response->assertStatus(200);
        $response->assertSee('não temos disponibilidade');
    }

}
