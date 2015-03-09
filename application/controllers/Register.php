<?php

/**
 * The Register controller. Allows the user to register for this application.
 *
 * @author Julian Brandrick
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

    /*
     * Function: validation()
     *
     * Params: void
     *
     * Notes:
     *  Pulls the information entered by the user and validates them. If it is
     *  valid, add user to database and load the login page. Else reload the
     *  current page.
     */
    function validation()
    {
        $record = $this->users->create();

        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|is_unique[users.username]'); //|is_unique[users.username]
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]'); //|valid_email|is_unique[users.email]

        if ($this->form_validation->run() == FALSE)
		{
			redirect('register');
		}
		else
		{
            $name = explode(' ', set_value('fullname'));

            $record->admin = 0;
            $record->username = set_value('username');
            $record->fname = $name[0];
            $record->lname = $name[1];
            $record->email = set_value('email');
            $record->pword = set_value('password1');

            $this->users->addUser($record);

			redirect("login");
		}
    }
}
