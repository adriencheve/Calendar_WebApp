<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class Registry extends MY_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('registry', 'userID');
    }
}
