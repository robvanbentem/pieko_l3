<?php

/**
 * @author Rob van Bentem.
 * @when 27-12-2012 3:02 PM
 */
class Shop extends EloquentExt {

    protected $_rules = array(
        'name' => 'required',
        'name_short' => 'required|max:8',
        'color' => 'required|match:/^#[0-9A-Fa-f]{6}$/'
    );

    public function products()
    {
        return $this->has_many_and_belongs_to('Product', 'product_shop', 'shop_id', 'product_id');
    }
}