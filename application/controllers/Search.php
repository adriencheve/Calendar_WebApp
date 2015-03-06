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
	
	public function getResults()
	{
		$record = array();
		$record['name'] = set_value('username');
		$record['date'] = set_value('eventDate');
		
		
		$raw_results = mysql_query("
		SELECT * 
		FROM events 
		WHERE ('name' LIKE '%".$record['name']."%') 
			OR ('description' LIKE '%".$record['name']."%')
		UNION
		SELECT * 
		FROM events
		WHERE (".$record['date']." BETWEEN 'start_date' AND 'end_date'");
		
		if(mysql_num_rows($raw_results) > 0)
		{
			//do  
		}
		else
		{
			//no results found
		}
	}
}