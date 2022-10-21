<?php

namespace App\Product\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use App\Product\Models\Product;

class ProductRepository
{    
    
    public function all($request = [], $search = [], $skip = null, $limit = null, $columns = ['*']){

        $products = collect([
            ["sku" => "000001", "name" => "Full coverage insurance", "category" => "insurance", "price" => 89000],
            ["sku"=> "000002", "name"=> "Compact Car X3", "category"=> "vehicle", "price"=> 99000],
            ["sku"=> "000003", "name"=> "SUV Vehicle, high end", "category"=> "vehicle", "price"=> 150000],
            ["sku"=> "000004", "name"=> "Basic coverage", "category"=> "insurance", "price"=> 20000],
            ["sku"=> "000005", "name"=> "Convertible X2, Electric", "category"=> "vehicle", "price"=> 250000 ]
        ]);

            // ([ { "sku" = "000001", "name" = "Full coverage insurance", "category" = "insurance", "price" = 89000 }
            //   { "sku": "000002", "name": "Compact Car X3", "category": "vehicle", "price": 99000 },
            //   { "sku": "000003", "name": "SUV Vehicle, high end", "category": "vehicle", "price": 150000 }, 
            //   { "sku": "000004", "name": "Basic coverage", "category": "insurance", "price": 20000 }, 
            //   { "sku": "000005", "name": "Convertible X2, Electric", "category": "vehicle", "price": 250000 } 
            // ]);

        // dd($search);

       

        $productsList = collect([]);

        foreach($products as $product) {

            $productsList->push(new Product($product));

        }


        $query = "";

        if (!is_null($request)) {
            foreach($request as $key => $value) {
                // dd($value);
                if (in_array($key, Product::getFieldsSearchable())) {
                    // $query->where($key, $value);
                    $productsList = $productsList->where($key, $value);
                }
            }
        }

        // return $filtered;
        // $query = $this->allQuery($search, $skip, $limit);

        return $productsList;
    }

}
