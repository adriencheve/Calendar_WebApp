<?php

/**
 * The Login controller. Allows the user to log into this application.
 *
 * @author Julian Brandrick
 */
class Login extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Function: index()
     *
     * Params: void
     *
     * Notes:
     *  Sets the title and body of the login page.
     *  Renders the page.
     */
    function index()
    {
        $this->data['title'] = 'Login';
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    /*
     * Function: validation()
     *
     * Params: void
     *
     * Notes:
     *  Pulls the username and password entered by the user and checks if they
     *  are valid. If they are valid, load the monthly page, else load the
     *  register page.
     *
     * Disclaimer:
     * 	We were not able to make session data work with all members.
     * 	Currently this website keeps persistent data by passing it through URI
     * 	segments.
     */
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

            redirect('monthly/index/' . $query);
        }
    }
}
