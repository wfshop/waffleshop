<?php

namespace Tests\Feature;

use Tests\TestCase;

class BakeTest extends TestCase
{
    public function testHasBakePage()
    {
        $this->get('/bake')
            ->assertStatus(200);
    }
}
