<?php

/**
 * This is a "CMS" model for users, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class Users extends MY_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('users', 'user_id');
    }

    function addUser($record)
    {
        $record->user_id = $this->highest() + 1;

        $this->add($record);
    }

    function login($record)
    {
        $query = $this->db->get_where('users', array('username' => $record['username']))->result_array();

        if(sizeof($query) > 0 && $query[0]['pword'] == $record['password'])
        {
            return $query[0];
        }
        else
        {
            return false;
        }
    }
}
