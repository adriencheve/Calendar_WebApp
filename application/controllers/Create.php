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

    function index($id)
    {
        $this->data['title'] = 'Create Event';
        $this->data['pagebody'] = 'create';
        $this->render();
    }

    function validation()
    {
        $this->form_validation->set_rules('eventName', 'Event Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('startingDate', 'Start Date', 'required');
        $this->form_validation->set_rules('endDate', 'End Date', 'required');

        var_dump($this->form_validation->run());
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
