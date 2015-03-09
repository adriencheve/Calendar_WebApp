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
	
	/*
	*	Queries the database for an event that matches the date, as well as
	*	name or description, as the values entered by the user.
	*/
	public function getResults()
	{
		$record = array();
		$record['name'] = set_value('username');
		$record['date'] = set_value('eventDate');
		$record['user_id'] = $this->session->cookie->userdata('user_id');
		
		if($record['name'] && $record['date'])
		{
			//	Selects all of the results from the database that match the query
			$raw_results = $this->db->query("
			SELECT * 
			FROM events 
			WHERE (('name' LIKE '%".$record['name']."%') 
				OR ('description' LIKE '%".$record['name']."%'))
				AND ('user_id' = ".$record['user_id'].")
			UNION
			SELECT * 
			FROM events
			WHERE (".$record['date']." BETWEEN 'start_date' AND 'end_date'
				AND ('user_id' = ".$record['user_id'].")
			");
			
			if(mysql_num_rows($raw_results) > 0)
			{
				foreach($raw_results as $result)
				{
					//	Temporary echo, will inject into view once complete
					echo $result->name;
					echo $result->date;
				}
			}
			else
			{
				echo "No matching results found.";
			}
		} 
		else
		{
			echo "Invalid Search Query";
		}
	}
}