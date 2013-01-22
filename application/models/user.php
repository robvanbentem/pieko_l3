<?php
/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 11/28/12 8:53 PM
 */
class User extends EloquentExt {

    protected $_rules = array(
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'firstname' => 'required|max:32',
        'lastname' => 'max:64',
    );

    public static $hidden = array('password');

    /**
     * Returns the prettified full name of a user
     *
     * @return mixed|string
     */
    public function fullname() {
        if($this->firstname === null) {
            return $this->email;
        }

        return trim($this->firstname . " " . $this->lastname);
    }

    public function roles()
    {
        return $this->has_many_and_belongs_to('Role', 'user_roles', 'user_id', 'role_id');
    }

    public function roles_array(){
        $roles = $this->roles()->get();

        return array_map(function($role) {
            return $role->id;
        }, $roles);
    }

    public function has_role($role_name){
        return $this->roles()->where('roles.name', '=', $role_name)->count() === 1 ? true : false;
    }
}