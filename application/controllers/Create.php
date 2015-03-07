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
        $this->data['pagebody'] = 'createevent';
        $this->render();
    }

    function validation()
    {
        $this->form_validation->set_rules('eventname', 'Event Name', 'required');
        $this->form_validation->set_rules('eventdescription', 'Description', 'required');
        $this->form_validation->set_rules('startdate', 'Start Date', 'required');
        $this->form_validation->set_rules('enddate', 'End Date', 'required');

        var_dump($this->form_validation->run());
        if ($this->form_validation->run() == FALSE)
		{
            redirect('create');
		}
		else
		{
            $record = $this->events->create();

            $record->user_id = 0;
            $record->name = set_value('eventname');
            $record->start_date = set_value('startdate');
            $record->end_date = set_value('enddate');
            $record->description = set_value('eventdescription');
            $imageName = set_value('image');
            $record->image = $imageName;

            $this->events->add_event($record);
            uploadImage($imageName);

	        redirect('calendar');
		}
    }

    public function uploadImage($imageName)
    {
        $config['upload_path']   = './Assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($imageName))
        {
            redirect('create');
        }
    }
}
