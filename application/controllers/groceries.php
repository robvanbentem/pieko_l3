<?php

/**
 * @author Rob van Bentem.
 * @when 30-01-2013 2:01 PM
 */
class Groceries_Controller extends Base_Controller
{

    public function action_index(){
        
    }
    
    public function action_add()
    {
        $product = Product::where_name(Input::get('product'))
            ->where_shop_id(Input::get('shop_id'))
            ->first();

        if($product === null){

            $product = new Product();
            $v = new Validator(Input::all(), $product->rules());

            if ($v->valid()) {
                $product->fill(array(
                    'shop_id' => Input::get('shop_id'),
                    'name' => Input::get('product'),
                    'price' => NULL
                ));
                $product->save();
            } else {
                return Redirect::error(500, $v->errors->messages);
            }
        }

        $grocerylist = new GroceryList();
        $v = new Validator(Input::all(), $grocerylist->rules());

        if ($v->valid()) {
            $grocerylist->fill(array(
                'user_id' =>  Auth::user()->id,
                'product_id' => $product->id,
                'date' => Session::instance()->get('date'),
            ));
            $grocerylist->save();
        } else {
            return Redirect::error(500, $v->errors->messages);
        }
    }
}
