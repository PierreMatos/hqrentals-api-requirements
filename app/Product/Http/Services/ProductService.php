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

        $products = $this->productRepository->all($request);

        $productsWithDiscounts = $this->checkDiscounts($products);

        return $productsWithDiscounts;

    }

    public function checkDiscounts($products){

        
        foreach($products as $product){
            
            $product = $this->productDiscounts->checkCategoryDiscount($product);
            
            $product = $this->productDiscounts->checkSKUDiscount($product);

        }

        return $products;

    }
}