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

    function validation()
    {
        $record = $this->users->create();

        $this->form_validation->set_rules('uname', 'uname', 'required|min_length[5]|max_length[12]|is_unique[users.username]'); //|is_unique[users.username]
        $this->form_validation->set_rules('flname', 'flname', 'required');
        $this->form_validation->set_rules('pass1', 'pass1', 'required|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'pass2', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]'); //|valid_email|is_unique[users.email]

        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('error');
            var_dump(validation_errors());
		}
		else
		{
            $name = explode(' ', set_value('flname'));

            $record->admin = 0;
            $record->username = set_value('uname');
            $record->fname = $name[0];
            $record->lname = $name[1];
            $record->email = set_value('email');
            $record->pword = set_value('pass1');

            $this->users->addUser($record);

			$this->load->view('success');
            $this->load->view('calendar');
		}
    }
}
