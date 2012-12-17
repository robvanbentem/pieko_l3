<?php
/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 11/28/12 8:53 PM
 */
class User extends EloquentExt {

    protected $_rules = array(
        'email' => 'required|email|unique:users',
        'password' => 'required|same:repeat|min:8',
        'repeat' => 'required|same:password',
        'firstname' => 'max:32',
        'lastname' => 'max:64',
    );

    /**
     * Returns the prettified full name of a user
     *
     * @return mixed|string
     */
    public function fullname() {
        if($this->firstname === null) {
            return $this->email;
        }
        return trim($this->firstname) . " " . trim($this->lastname);
    }

    public function roles()
    {
        return $this->has_many_and_belongs_to('Role', 'user_roles', 'user_id', 'role_id');
    }

    public function has_role($role_name){
        return $this->roles()->where('roles.name', '=', $role_name)->count() === 1 ? true : false;
    }
}