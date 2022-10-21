<?php

namespace App\Product\Http\Controllers;

use Illuminate\Http\Request;

use App\Product\Models\Product;
use App\Http\Controllers\Controller;

use App\Product\Http\Services\ProductService;

class ProductAPIController extends Controller
{

    

    public function index(Request $request, ProductService $productService)
        {

            // dd($request->input());
            $products = $productService->getProducts($request->input());

            return $products; 
            // return ( $this->productService->all() );

        }
}