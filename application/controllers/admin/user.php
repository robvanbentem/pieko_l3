<?php
/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 1/22/13 8:20 PM
 */
class Admin_User_Controller extends App_Controller
{

    public function before(){
        parent::before();
        $this->title(__('pieko.common.admin'));
    }


    public function action_create()
    {
        if (Request::method() === "POST") {
            return $this->post_create();
        }

        return View::make('admin.user.create', array(
            'roles' => Role::all_options()
        ));
    }

    private function post_create()
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

    public function action_update($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return Redirect::error(500);
        }

        if(Request::method() === "POST"){
            return $this->post_update($user);
        }

        return View::make('admin.user.update', array(
            'user' => $user,
            'roles' => Role::all_options()
        ));
    }

    private function post_update($user)
    {
        if(Input::get('password', '') !== ''){
            $input = Input::all();
        } else {
            $input = Input::except('password');
            $input['password'] = $user->password;
        }

        if(Input::get('enabled') === null){
            $input['enabled'] = 0;
        }

        $rules = $user->rules();
        $rules['email'] = $rules['email'].','.$user->id;

        $v = new Validator($input, $rules);

        if ($v->valid()) {
            Input::replace($input);
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

            return Redirect::to_action('admin@index')
                ->with('msg', array(__('pieko.msg.user_updated_title'), __('pieko.msg.user_updated', $user->fullname())));
        } else {
            return Redirect::to_action('admin@user', array('update', $user->id))
                ->with_input()
                ->with_errors($v);
        }

    }
}
