<?php

namespace App\Product\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use App\Product\Models\Product;

class ProductRepository
{    
    
    public function all($request = [], $search = [], $skip = null, $limit = null, $columns = ['*']){

        $productsList = collect();
        $query = "";

        //DATASET
        $products = collect([
            ["sku" => "000001", "name" => "Full coverage insurance", "category" => "insurance", "price" => 89000],
            ["sku"=> "000002", "name"=> "Compact Car X3", "category"=> "vehicle", "price"=> 99000],
            ["sku"=> "000003", "name"=> "SUV Vehicle, high end", "category"=> "vehicle", "price"=> 150000],
            ["sku"=> "000004", "name"=> "Basic coverage", "category"=> "insurance", "price"=> 20000],
            ["sku"=> "000005", "name"=> "Convertible X2, Electric", "category"=> "vehicle", "price"=> 250000 ]
        ]);

        

        foreach($products as $product) {
            
            //ADD PRICE FIELDS
            $product['price'] = [
                  "original"=> $product['price'],
                  "final"=> $product['price'],
                  "currency"=>"EUR",
                  "discount"=> null
                ];
                
            // CREATE COLLLECTION OF PRODUCTS
            $productsList->push(new Product($product));
        }


        //FILTER RESULT IF SEARCH IS APPLIED
        if (!is_null($request)) {

            foreach($request as $key => $value) {

                //CHECK IF REQUEST MATCH SEARCHABLE FIELDS
                if (in_array($key, Product::getFieldsSearchable())) {

                    //IF PRICE, CHECK ORIGINAL PRICE FIELD
                    if ($key == 'price') {

                        $key = 'price.original';

                    }

                        $productsList = $productsList->where($key, $value);

                }

            }

        }

        return $productsList;
    }

}
