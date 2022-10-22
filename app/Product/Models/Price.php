<?php

namespace App\Product\Models;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Price implements CastsAttributes
{
    /**
     * @var string
     */
    private $priceField;
    /**
     * @var string
     */
    private $currencyField;
    /**
     * @var bool
     */
    private $useMinor;

    public function __construct
    (
        $priceField = 'price',
        $currencyField = 'currency',
        $useMinor = true
    ) {
        $this->priceField = $priceField;
        $this->currencyField = $currencyField;
        $this->useMinor = $useMinor;
    }

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
       

        dd($attributes);
        return $attributes;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
       

        return($attributes);
        // return ('aaa');
    }
}