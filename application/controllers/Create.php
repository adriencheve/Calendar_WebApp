<?php

/**
 * The Login controller. Allows the user to log into this application.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class Create extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Create Event';
        $this->data['pagebody'] = 'create';
        $this->render();
    }

    /*
     * Function: validation()
     *
     * Params: void
     *
     * Notes:
     *  Pulls the event information entered by the user and validates it. If it
     *  is valid, enter it into the database and load the monthly page. Else
     *  reload the current page.
     */
    function validation()
    {
        $this->form_validation->set_rules('eventName', 'Event Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('startingDate', 'Start Date', 'required');
        $this->form_validation->set_rules('endDate', 'End Date', 'required');

        if ($this->form_validation->run() == FALSE)
		{
            redirect('create');
		}
		else
		{
            $record = $this->events->create();

            $record->user_id = 0;
            $record->name = set_value('eventName');
            $record->start_date = set_value('startingDate');
            $record->end_date = set_value('endDate');
            $record->description = set_value('description');
            $record->image = $this->uploadImage('eventDescription');

            $this->events->add_event($record);

	        redirect('monthly');
		}
    }

    /*
     * Function: uploadImage($imageName)
     *
     * Params: $imageName
     * 	The name of the uploaded image.
     *
     * Notes:
     *  Pulls the username and password entered by the user and checks if they
     *  are valid. If they are valid, load the monthly page, else load the
     *  register page.
     */
    public function uploadImage($imageName)
    {
        $path = './Assets/img/';

        $config['upload_path']   = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($imageName))
        {
            return $path . 'placeholder.jpg';
        }

        $fileRecord = $this->upload->data();

        return $path . $fileRecord['file_name'];
    }
}
