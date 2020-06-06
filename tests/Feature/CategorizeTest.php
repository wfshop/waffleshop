<?php

namespace Tests\Feature;

use App\Category;
use App\Waffle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategorizeTest extends TestCase
{
    use RefreshDatabase;

    public function testCategorize()
    {
        $waffle = create(Waffle::class);
        $category = create(Category::class);

        $waffle->categorize($category);

        $this->assertCount(1, $category->waffles);
        $this->assertTrue($category->waffles[0]->is($waffle));
    }

    public function testSupportsMultipleCategories()
    {
        $waffle = create(Waffle::class);
        $categories = create(Category::class, [], 2);

        $waffle->categorize($categories);

        $this->assertCount(2, $waffle->categories);
    }
}
