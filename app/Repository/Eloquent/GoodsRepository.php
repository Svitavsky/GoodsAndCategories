<?php

namespace App\Repository\Eloquent;

use App\Models\Goods;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class GoodsRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Goods $model
     */
    public function __construct(Goods $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
