<?php

namespace App\Product\Models;

use Eloquent as Model;
use     \Price;

class Product extends Model
{

    public $fillable = [
        'sku',
        'name',
        'category',
        'price',
        'original',
        'final'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sku' => 'string',
        'name' => 'string',
        'category' => 'string',
        'price' => 'array',
        'price.original' => 'integer',
        'final' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sku' => 'required',
        'name' => 'required',
    ];

 
    public function getFieldsSearchable(){

        $fields = ['category', 'price'];

        return $fields;
    }
}
