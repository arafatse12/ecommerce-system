<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Repository;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepo extends Repository
{

    public function model()
    {
        return Product::class;
    }

    public function getByPaginate($request) : LengthAwarePaginator
    {
        $pagination = $request->per_page ?? 20;
        $filter = $request->keyword;
        return   $this->query()
            ->when($filter,function (Builder $product) use ($filter) {
                    return $product->where('product_title', 'like', "%$filter%");
                }
            )
            ->orderBy(sortBy($request)->column, sortBy($request)->sort)
            ->paginate($pagination);
    }

}
