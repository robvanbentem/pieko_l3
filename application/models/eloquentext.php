<?php

/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 11/28/12 8:56 PM
 */
class EloquentExt extends Eloquent
{
    // Validation rules
    protected $_rules = array();


    /**
     * Returns the rules used to validate the model
     *
     * @return array
     */
    public function rules() {
        return $this->_rules;
    }
}
