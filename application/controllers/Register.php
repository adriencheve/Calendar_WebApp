<?php

/**
 * The Register controller. Allows the user to register for this application.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class Register extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Register';
        $this->data['pagebody'] = 'register';
        $this->render();
    }
}
