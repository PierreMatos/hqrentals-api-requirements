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
        $productsWithDiscounts = $this->checkDiscounts($products);

        return $productsWithDiscounts;

    }

    public function checkDiscounts($products){

        foreach($products as $product){
            
            //LIST OF AVAILABLE DISCOUNTS
            $product = $this->productDiscounts->checkCategoryDiscount($product);
            
            $product = $this->productDiscounts->checkSKUDiscount($product);

        }

        return $products;

    }
}