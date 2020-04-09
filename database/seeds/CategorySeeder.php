<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * @var int - Maximum nesting level of generated categories
     */
    const NESTING_LEVEL = 3;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $root = factory(Category::class, rand(10, 20))->create();

        $categories = $root->pluck('id')->toArray();
        for ($i = 0; $i < self::NESTING_LEVEL; $i++) {
            $childCategories = [];
            foreach ($categories as $category) {
                $childCategories += factory(Category::class, rand(0, 10))->create([
                    'parent_id' => $category
                ])->pluck('id')->toArray();
            }
            $categories = $childCategories;
        }

        Category::fixTree();
    }
}
