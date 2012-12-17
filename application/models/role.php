<?php

/**
 * @author Rob van Bentem.
 * @when 17-12-2012 3:08 PM
 * @package Unifact
 */
class Role extends EloquentExt
{
    public function users()
    {
        return $this->has_many_and_belongs_to('User', 'user_roles');
    }
}
