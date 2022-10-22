<?php

namespace App\Product\Http\Services;

class ProductDiscountService
{
    
    public function checkCategoryDiscount($product){

        if ($product->category == "insurance"){

            // $newarray = array('original' => 1234);
            // array_replace($product->price, $product->price, $newarray);
            // dd($product['price']['original']);
            // $product['price']['original'] = $newarray;
            // $product->price['original'] = 123;
            $discount = '30%';
            $final = $product->price['original'] * 0.7;
            $product->price = array_merge($product->price, ['final' => $final]);
            $product->price = array_merge($product->price, ['discount' => $discount]);

            // dd($product);
            // data_fill($product, 'product.price.final', 200);

            // $product->price['final'] = $product->price['original'] * 0.7;

        }

        return $product;
    }

    public function checkSKUDiscount($product){

        if ($product->sku == 000003 ){

            $discount = '15%';
            $final = $product->price['original'] * 0.85;
            $product->price = array_merge($product->price, ['final' => $final]);
            $product->price = array_merge($product->price, ['discount' => $discount]);
            // $product->price->final = $product->price->original * 0.85;

        }

        return $product;

    }
}