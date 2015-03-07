<?php

/**
 * The Login controller. Allows the user to log into this application.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class Login extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Login';
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    function validation()
    {
        $record = array();

        $record['username'] = set_value('username');
        $record['password'] = set_value('password');

        $query = $this->users->login($record);

        if(!$query)
        {
            redirect('register');
        }
        else
        {
            $this->session->cookie->set_userdata($query);

            redirect('monthly');
        }
    }
}
