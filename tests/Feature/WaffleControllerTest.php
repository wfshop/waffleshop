<?php

namespace Tests\Feature;

use App\Waffle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WaffleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $waffle = make(Waffle::class);

        $this->actingAs($waffle->baker, 'api')
            ->postJson(route('waffles.store'), $waffle->toArray())
            ->assertJsonStructure(['id']);
    }

    public function testGuestCannotStoreWaffle()
    {
        $waffle = make(Waffle::class);

        $this->postJson(route('waffles.store'), $waffle->toArray())
            ->assertStatus(401);
    }

    public function testView()
    {
        $waffle = create(Waffle::class);

        $this->actingAs($waffle->baker)
            ->get(route('waffles.show', $waffle))
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        $waffle = create(Waffle::class);

        $this->actingAs($waffle->baker)
            ->put(route('waffles.update', $waffle), [
                'html' => $html = '<h1>Hey there!</h1>',
                'css' => $css = 'h1 { color: #333 }',
                'js' => $js = 'console.log(1 + 2)',
            ])
            ->assertJson(compact('html', 'css', 'js'));
    }
}
