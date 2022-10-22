<?php

namespace App\Product\Http\Services;

class ProductDiscountService
{
    //CLASS TO ADD ALL DISCOUNTS AND RULES

    public function checkDiscounts($products){

        foreach($products as $product){
            
            //LIST OF AVAILABLE DISCOUNTS
            $product = $this->checkCategoryDiscount($product);
            
            $product = $this->checkSKUDiscount($product);

        }

        return $products;

    }

    //DISCOUNTS BY CATEGORY
    public function checkCategoryDiscount($product){

        if ($product->category == "insurance"){

            $discount = '30%';
            $final = $product->price['original'] * 0.7;
            $product->price = array_merge($product->price, ['final' => $final]);
            $product->price = array_merge($product->price, ['discount' => $discount]);

        }

        return $product;
    }

    // DISCOUNT BY SKU NUMBER
    public function checkSKUDiscount($product){

        if ($product->sku == 000003 ){

            $discount = '15%';
            $final = $product->price['original'] * 0.85;
            $product->price = array_merge($product->price, ['final' => $final]);
            $product->price = array_merge($product->price, ['discount' => $discount]);

        }

        return $product;

    }
}