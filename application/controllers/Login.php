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

        $record['username'] = set_value('uname');
        $record['password'] = set_value('pass');

        $record = $this->users->login($record);
        if($record != NULL)
        {
            $name = $record->fname . ' ' . $record->lname;

            $this->load->view('success_login', array('flname' => $name));
            $this->load->view('calendar');
        }
        else
        {
            $this->load->view('error');
        }
    }
}
