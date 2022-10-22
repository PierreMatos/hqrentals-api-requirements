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

            //Adicionar preços
            // array_push($product,"original" ,"yellow");

            // dd(
            //     array(
            //           "original"=> $product['price'],
            //           "final"=> $product['price'],
            //           "currency"=>"EUR",
            //           "discount"=> 0
            //         )
            //     );
            
            $product['price'] = [
                // $product,
                // "price" => array(
                  "original"=> $product['price'],
                  "final"=> $product['price'],
                  "currency"=>"EUR",
                  "discount"=> null
                // )
                ];
                
            // dd($product);
            // $newCompete = array('original'=>123);
            // array_push($product, $newCompete);
            // $yo->append(['original' => 123]);
            // unset($product["price"]);
            // $product['price'] = [];
            // $product['price'] = array('original'=>123);
            // $product['price']['original'] = 324;
            // $product['price']['final'] = 324;
            // $product['price']['discount_percentage'] = 324;
            // $product['price']['currency'] = 324;

            // dd($product);
            // $product->price->push(['final' => $final]);
            // $product->price->push(['discount_percentage' => $discountPercentage]);
            // $product->price->push(['currency' => $currency]);

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

        return $productsList;
    }

}
