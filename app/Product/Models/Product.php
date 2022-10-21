<?php

namespace App\Product\Models;

use Eloquent as Model;

class Product extends Model
{

    public $table = 'benefits';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'sku',
        'name',
        'category',
        'price'
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
        'price' => 'integer'
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
