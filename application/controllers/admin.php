<?php

/**
 * @author Rob van Bentem.
 * @when 28-12-2012 9:45 AM
 */
class Admin_Controller extends App_Controller
{
    public function before()
    {
        parent::before();
        $this->title(__('pieko.common.admin'));
    }

    /**
     * Users/shops/products overview
     *
     * @return Laravel\View
     */
    public function action_index()
    {
        // build user body array
        $users = User::order_by('firstname')->get();
        $users_body = array();
        foreach ($users as $user) {
            $users_body[] = array(
                $user->id,
                $user->firstname,
                $user->lastname,
                $user->email,
                $user->enabled ? __('common.yes') : __('common.no'),
                HTML::link(URL::to_action('admin@user', array('update', $user->id)), lca(__('pieko.common.edit')))
            );
        }

        $view_users = View::make('admin.user.list', array(
            'body' => $users_body
        ));


        // build shops body array
        $shops = Shop::order_by('name')->get();
        $shops_body = array();
        foreach ($shops as $shop) {
            $shops_body[] = array(
                $shop->id,
                $shop->name,
                $shop->name_short,
                HTML::link(URL::to_action('admin@shop@update', array($user->id)), lca(__('pieko.common.edit')))
            );
        }

        $view_shops = View::make('admin.shop.list', array(
            'body' => $shops_body
        ));

        // build shops body array
        $products = Product::order_by('name')->get();
        $products_body = array();
        foreach ($products as $product) {
            $products_body[] = array(
                $product->id,
                $product->name,
                Helper::amount($product->price),
                $product->shop->name,
                HTML::link(URL::to_action('admin@product@update', array($user->id)), lca(__('pieko.common.edit')))
            );
        }

        $view_products = View::make('admin.product.list', array(
            'body' => $products_body
        ));

        return View::make('admin.index', array(
            'users' => $view_users,
            'shops' => $view_shops,
            'products' => $view_products
        ));
    }
}
