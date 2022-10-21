<?php

namespace App\Product\Http\Services;

class ProductDiscountService
{
    
    public function checkCategoryDiscount($product){

        if ($product->category == "insurance"){

            $product->price = $product->price * 0.7;

        }

        return $product;
    }

    public function checkSKUDiscount($product){

        if ($product->sku == 000003 ){

            $product->price = $product->price * 0.85;

        }

        return $product;

    }
}