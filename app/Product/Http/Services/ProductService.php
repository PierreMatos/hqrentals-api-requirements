<?php

namespace App\Product\Http\Services;

use App\Product\Repositories\ProductRepository;
use App\Product\Http\Services\ProductDiscountService;

class ProductService
{

    public function __construct(ProductRepository $productRepo, ProductDiscountService $productDiscountService)
    {
        $this->productRepository = $productRepo;
        $this->productDiscounts = $productDiscountService;
    }

    public function getProducts($request)
    {

        //GET DATA
        $products = $this->productRepository->all($request);

        //CHECK ALL DISCOUNTS
        $productsWithDiscounts = $this->productDiscounts->checkDiscounts($products);

        return $productsWithDiscounts;

    }

}