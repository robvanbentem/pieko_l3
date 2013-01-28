<?php

/**
 * @author Rob van Bentem.
 * @when 27-12-2012 2:56 PM
 */
class Product extends EloquentExt {

    protected $_rules = array(
        'name' => 'required',
        'shop_id' => 'exists:shops,id'
    );

    public function shop()
    {
        return $this->belongs_to('Shop');
    }
}