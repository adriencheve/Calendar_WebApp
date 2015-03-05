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
        
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        
        $this->data['title'] = 'Register';
        $this->data['pagebody'] = 'register';
        $this->render();
         
    }
    
    function validation()
    {
        
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('uname', 'uname', 'required|min_length[5]|max_length[12]'); //|is_unique[users.username]
        $this->form_validation->set_rules('pass1', 'pass1', 'required|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'pass2', 'required');
        $this->form_validation->set_rules('email', 'email', 'required'); //|valid_email|is_unique[users.email]
        
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('error');
		}
		else
		{
			$this->load->view('success');
            $this->load->view('calendar');
		}
    }
}
