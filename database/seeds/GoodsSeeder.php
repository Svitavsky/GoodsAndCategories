<?php

use App\Models\Goods;
use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Goods count to generate
     */
    const GOODS_COUNT = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goods::truncate();
        factory(Goods::class, self::GOODS_COUNT)->create();
    }
}
