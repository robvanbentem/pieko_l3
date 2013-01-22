<?php

/**
 * @author Rob van Bentem.
 * @when 28-12-2012 9:45 AM
 */
class Admin_Controller extends App_Controller
{
    public function before(){
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

        $a = __('pieko.common.user');

        // build user body array
        $users = User::order_by('firstname')->get();
        $users_body = array();
        foreach ($users as $user) {
            $users_body[] = array(
                $user->id,
                $user->firstname,
                $user->lastname,
                $user->email,
            );
        }

        $view_users = View::make('admin.users', array(
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
            );
        }

        $view_shops = View::make('admin.shops', array(
            'body' => $shops_body
        ));


        return View::make('admin.index', array(
            'users' => $view_users,
            'shops' => $view_shops
        ));
    }

    public function action_user($action, $id = null)
    {
        $this->title(__('pieko.common.user'));

        if (Request::method() === "POST") {
            switch ($action) {
                case 'create':
                    return $this->post_user_create();
                case 'update':
                    return $this->post_user_update($id);
                default:
                    return Redirect::error(500);
            }
        } else {
            switch ($action) {
                case 'create':
                    return $this->get_user_create();
                case 'update':
                    return $this->get_user_update($id);
                default:
                    return Redirect::error(500);
            }
        }
    }



    public function action_shop($action, $id = null)
    {
        $this->title(__('pieko.model.shop.singular'));

        if (Request::method() === "POST") {
            switch ($action) {
                case 'create':
                    return $this->post_shop_create();
                case 'update':
                    return $this->post_shop_update($id);
                default:
                    return Redirect::error(500);
            }
        } else {
            switch ($action) {
                case 'create':
                    return $this->get_shop_create();
                case 'update':
                    return $this->get_shop_update($id);
                default:
                    return Redirect::error(500);
            }
        }
    }

    // ---------------
    // USER UPDATE
    // ---------------

    private function get_user_update($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return Redirect::error(500);
        }

        return View::make('admin.user.update', array(
            'user' => $user,
            'roles' => Role::all_options()
        ));
    }

    private function post_user_update($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return Redirect::error(500);
        }

        if(Input::get('password', '') !== ''){
            $input = Input::all();
        } else {
            $input = Input::except('password');
            $input['password'] = $user->password;
        }

        $rules = $user->rules();
        $rules['email'] = $rules['email'].','.$user->id;

        $v = new Validator($input, $rules);

        if ($v->valid()) {
            $user->fill(Input::except(array('roles', 'password')));

            if(Input::get('password', '') !== ''){
                $user->password = Hash::make(Input::get('password'));
            }

            $user->save();

            // Set the user roles
            $user->roles()->delete();
            foreach (Input::get('roles') as $role_id) {
                $user->roles()->attach($role_id);
            }

            return Redirect::to_action('admin@user', array('update', $user->id));
        } else {
            return Redirect::to_action('admin@user', array('update', $user->id))
                ->with_input()
                ->with_errors($v);
        }

    }

    // ---------------
    // USER CREATE
    // ---------------

    private function get_user_create()
    {
        return View::make('admin.user.create', array(
            'roles' => Role::all_options()
        ));
    }

    private function post_user_create()
    {
        $user = new User();
        $v = new Validator(Input::all(), $user->rules());

        if ($v->valid()) {
            $user->fill(Input::except('roles'));
            $user->password = Hash::make(Input::get('password'));

            $user->save();

            // Set the user roles
            foreach (Input::get('roles') as $role_id) {
                $user->roles()->attach(Role::find($role_id));
            }

            return Redirect::to_action('admin@user', array('update', $user->id));
        } else {
            return Redirect::to_action('admin@user', array('create'))
                ->with_input()
                ->with_errors($v);
        }
    }



    // ---------------
    // SHOP CREATE
    // ---------------

    private function get_shop_create()
    {
        return View::make('admin.shop.create');
    }

    private function post_shop_create()
    {
        $shop = new Shop();
        $v = new Validator(Input::all(), $shop->rules());

        if ($v->valid()) {
            $shop->fill(Input::all());
            $shop->save();

            return Redirect::to_action('admin@shop', array('update', $shop->id));
        } else {
            return Redirect::to_action('admin@shop', array('create'))
                ->with_input()
                ->with_errors($v);
        }
    }


    // ---------------
    // SHOP UPDATE
    // ---------------

    private function get_shop_update($id)
    {
        $shop = Shop::find($id);

        if ($shop === null) {
            return Redirect::error(500);
        }

        return View::make('admin.shop.update', array(
            'shop' => $shop
        ));
    }

    private function post_shop_update($id)
    {
        $shop = Shop::find($id);

        if ($shop === null) {
            return Redirect::error(500);
        }

        $rules = $shop->rules();

        $v = new Validator(Input::all(), $rules);

        if ($v->valid()) {
            $shop->fill(Input::all());
            $shop->save();

            return Redirect::to_action('admin@shop', array('update', $shop->id));
        } else {
            return Redirect::to_action('admin@shop', array('update', $shop->id))
                ->with_input()
                ->with_errors($v);
        }

    }
}
