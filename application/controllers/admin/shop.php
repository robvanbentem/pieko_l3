<?php
/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 1/22/13 8:28 PM
 */
class Admin_Shop_Controller extends App_Controller
{

    public function action_create()
    {
        if(Request::method() === "POST"){
            return $this->post_create();
        }

        return View::make('admin.shop.create');
    }

    private function post_create()
    {
        $shop = new Shop();
        $v = new Validator(Input::all(), $shop->rules());

        if ($v->valid()) {
            $shop->fill(Input::all());
            $shop->save();

            return Redirect::to_action('admin');
        } else {
            return Redirect::to_action('admin@shop@create')
                ->with_input()
                ->with_errors($v);
        }
    }

    public function action_update($id)
    {
        $shop = Shop::find($id);

        if ($shop === null) {
            return Redirect::error(500);
        }

        if(Request::method() === "POST"){
            return $this->post_update($shop);
        }

        return View::make('admin.shop.update', array(
            'shop' => $shop
        ));
    }

    private function post_update($shop)
    {
        $rules = $shop->rules();

        $v = new Validator(Input::all(), $rules);

        if ($v->valid()) {
            $shop->fill(Input::all());
            $shop->save();

            return Redirect::to_action('admin');
        } else {
            return Redirect::to_action('admin@shop@update', array($shop->id))
                ->with_input()
                ->with_errors($v);
        }
    }
}