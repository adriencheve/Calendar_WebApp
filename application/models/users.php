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
}
