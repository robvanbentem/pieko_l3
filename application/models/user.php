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
}