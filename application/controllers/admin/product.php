<?php

/**
 * @author Rob van Bentem.
 * @when 28-01-2013 2:28 PM
 */
class Admin_Product_Controller extends App_Controller
{
    public function action_create()
    {
        if (Request::method() === "POST") {
            return $this->post_create();
        }

        $shops = Shop::order_by('name')->get();
        $options = array();
        foreach ($shops as $shop) {
            $options[$shop->id] = $shop->name;
        }


        return View::make('admin.product.create', array(
            'shops' => $options
        ));
    }

    private function post_create()
    {
        $product = new Product();
        $v = new Validator(Input::all(), $product->rules());

        if ($v->valid()) {
            $product->fill(Input::all());
            $product->save();

            return Redirect::to_action('admin');
        } else {
            return Redirect::to_action('admin@product@create')
                ->with_input()
                ->with_errors($v);
        }
    }

    public function action_update($id)
    {
        $product = Product::find($id);

        if ($product === null) {
            return Redirect::error(500);
        }

        if(Request::method() === "POST"){
            return $this->post_update($product);
        }

        $shops = Shop::order_by('name')->get();
        $options = array();
        foreach ($shops as $shop) {
            $options[$shop->id] = $shop->name;
        }

        return View::make('admin.product.update', array(
            'product' => $product,
            'shops' => $options,
        ));
    }

    private function post_update($product)
    {
        $rules = $product->rules();

        $v = new Validator(Input::all(), $rules);

        if ($v->valid()) {
            $product->fill(Input::all());
            $product->save();

            return Redirect::to_action('admin');
        } else {
            return Redirect::to_action('admin@product@update', array($product->id))
                ->with_input()
                ->with_errors($v);
        }
    }
}
