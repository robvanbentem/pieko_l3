<?php

/**
 * @author Rob van Bentem.
 * @when 17-12-2012 3:08 PM
 */
class Role extends EloquentExt
{
    public function users()
    {
        return $this->has_many_and_belongs_to('User', 'user_roles');
    }

    public static function all_array(){
        return array_map(function($role) {
            return $role->id;
        }, Role::all());
    }

    public static function all_options(){
        $options = array();
        $roles = Role::all();

        foreach ($roles as $role) {
            $options[$role->id] = $role->name;
        }

        return $options;
    }
}
