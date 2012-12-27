<?php

/**
 * @author Rob van Bentem.
 * @when 27-12-2012 2:56 PM
 */
class Product extends EloquentExt {

    protected $_rules = array(
        'name' => 'required',
    );

    public function shops()
    {
        return $this->has_many_and_belongs_to('Shop', 'product_shop', 'product_id', 'shop_id');
    }
}