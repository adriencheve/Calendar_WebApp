<?php
class Search extends Application {

	function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$this->data['title'] = 'Search';
        $this->data['pagebody'] = 'search';
        $this->render();
	}
	
	public function results()
	{
		
	}
}