<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\ProductRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index(Request $request)
    {
        $products = $this->productRepo->getByPaginate($request);
        return response()->json(returnData(2000, $products));
    }

    public function store(ProductRequest $request)
    {
        $products = $this->productRepo->create($request->all());
        return response()->json(returnData(2000, null, 'New product inserted successfully'));
    }

    public function update(ProductRequest $request, $primaryKey)
    {
        $product = $this->productRepo->find($primaryKey);
        $this->productRepo->update($product, $request->all());
        return response()->json(returnData(2000, null, 'Product updated successfully'));
    }

    public function destroy($primaryKey)
    {
        $this->productRepo->delete($primaryKey);
        return response()->json(returnData(2000, null, 'Product deleted successfully'));
    }

}
