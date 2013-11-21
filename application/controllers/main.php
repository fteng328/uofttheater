<?php



class Main extends CI_Controller {

    
    function __construct() {
    	// Call the Controller constructor
    	parent::__construct();
    }
        
    function index() {
	    	$data['main']='main/index';
	    	$this->load->view('template', $data);
    }
    
	
    
   
    
    function search_by_movie()
    {
    	$this->load->helper('inflector');
    	$this->load->library('table');
    	$this->load->model('showtime_model');
    	
    	
    	$date = $this->session->userdata('date');
    	$movie = $_POST['movie'];
    	$newdata = array('movie'  => $movie);
    	$this->session->set_userdata($newdata);
    	
    	$result = $this->showtime_model->searchByMovie($date, $movie);
    	
    	if ($result->num_rows() > 0){
    	
    		//Prepare the array that will contain the data
    		
    		
    		$search_result = array();
    		
    		
    		$i = 0;
    		foreach ($result->result() as $row){
    			$search_result[$i][0] = $row->date;
    			$search_result[$i][1] = $row->title;
    			$search_result[$i][2] = $row->name;
    			$search_result[$i][3] = $row->address;
    			$search_result[$i][4] = $row->time;
    			$search_result[$i][5] = $row->available;
    			$i = $i + 1;
    		}
    		
    		$data['search_result'] = $search_result;
    	}
    	
    	
    	$data['main'] = 'main/search_results';
    	$this->load->view('template', $data);
    	
    }
    
    function search_by_venue()
    {
    	
    	
    	$this->load->helper('inflector');
    	$this->load->library('table');
    	$this->load->model('showtime_model');
    	
    	
    	$date = $this->session->userdata('date');
    	$venue = $_POST['venue'];
    	$newdata = array('venue'  => $venue);
    	$this->session->set_userdata($newdata);
    	
    	
    	$result = $this->showtime_model->searchByLocation($date, $venue);
    	

    	
    	if ($result->num_rows() > 0){
    	
    		$search_result = array();
    	
    	
    		$i = 0;
    		foreach ($result->result() as $row){
    			$search_result[$i][0] = $row->date;
    			$search_result[$i][1] = $row->title;
    			$search_result[$i][2] = $row->name;
    			$search_result[$i][3] = $row->address;
    			$search_result[$i][4] = $row->time;
    			$search_result[$i][5] = $row->available;
    			$i = $i + 1;
    		}
    	
    		$data['search_result'] = $search_result;
    	}
    	
    	
    	
    	
    	$data['main'] = 'main/search_results';
    	$this->load->view('template', $data);
    	
    }
    
    
    function go_to_search()
    {
    	$this->load->library('session');
    	$this->load->model('showtime_model');
    	
    	$dates = $this->showtime_model->get_all_dates();
    	$dates_result = array();
    	
    	$i = 0;
    	if ($dates->num_rows() > 0){
    		foreach ($dates->result() as $row){
    			$dates_result[$i] = $row->date;
    			$i = $i + 1;
    		}
    	}
    	
    	$data['dates_result'] = $dates_result;
    	$data['main'] = 'main/search_step1';
    	
    	$this->load->view('template', $data);
    }
    
    
    

    
    function pass_in_date(){
    	$date = $_POST['date'];
    	
		$newdata = array('date'  => $date);
    	$this->session->set_userdata($newdata);
    	$this->load->model('showtime_model');
    	 
    	$movies = $this->showtime_model->get_all_movies();
    	$movies_result = array();
    	 
    	$i = 0;
    	if ($movies->num_rows() > 0){
    		foreach ($movies->result() as $row){
    			$movies_result[$i] = $row->title;
    			$i = $i + 1;
    		}
    	}
    	 
    	$data['movies_result'] = $movies_result;

    	
    	
    	$theaters = $this->showtime_model->get_all_theaters();
    	$theaters_result = array();
    	 
    	$i = 0;
    	if ($theaters->num_rows() > 0){
    		foreach ($theaters->result() as $row){
    			$theaters_result[$i] = $row->name;
    			$i = $i + 1;
    		}
    	}
    	 
    	$data['theaters_result'] = $theaters_result;
    	
    	
    	$data['main'] = 'main/search_step2';
    	 
    	$this->load->view('template', $data);
    }
    
   
    
    
    function mark_ticket(){
    	
    	$this->load->helper('inflector');
    	
    	$date = $_POST['date'];
    	$movie = $_POST['movie'];
    	$theater = $_POST['theater'];
    	$address = $_POST['address'];
    	$time = $_POST['time'];
    	
    	
    	echo $movie;
    	echo "<br/>";
    	echo $theater;
    	echo "<br/>";
    	echo $date;
    	echo "<br/>";
    	echo $time;
    	echo "<br/>";
    	
    	
    	$this->load->model('showtime_model');
    	$id = $this->showtime_model->get_showtime_id($movie, $theater, $date, $time);
		echo 'this: ';
    	
    	$showtime_id;
    	foreach ($id->result() as $row){
    		echo $row->tid;
    		$showtime_id = $row->tid;
    		echo '  ';
    		echo $row->title;
    		echo '  ';
    		echo $row->name;
    		echo '  ';
    		echo $row->date;
    		echo '  ';
    		echo $row->time;
    		echo "<br/>";
    	}
    	
    	
    	
    	$newdata = array(
    			'm_date'  => $date, 
    			'm_movie' => $movie, 
    			'm_theater' => $theater, 
    			'm_address' => $address, 
    			'm_time' => $time,
    			'showtime_id' => $showtime_id
    			);
    	$this->session->set_userdata($newdata);
    	
    	

    	$this->load->model('ticket_model');
    	
    	$seats_taken = $this->ticket_model->get_seats_taken($showtime_id);
    	
    	$seats_cache = array(0,0,0);
    	

    	
    	
    	if ($seats_taken->num_rows() > 0){
    		foreach ($seats_taken->result() as $row2){
    			$temp = $row2->seat_id;
    			echo 'low:';
    			echo $temp;
    			$seats_cache[$temp] = 2;
    		}
    	}
    	echo 'passed';
    	
    	$data['seats_cache'] = $seats_cache;
    	$data['main'] = 'main/select_seat';
    	$this->load->view('template', $data);
    }
    
     	function go_to_payment()
 	{
 		$seat = $_POST['seat'];
 		
 		
 		$newdata = array(
 				'seat' => $seat
 				);
 		$this->session->set_userdata($newdata);
 		
		$data['main'] = 'main/creditcard';
		$this->load->view('template',$data);
		
	}
	
		function go_to_summary()
		{
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['LastName'];
			$cardNumber = $_POST['cardNumber'];
			$month = $_POST['Month'];
			$year = $_POST['Year'];
			
			$newdata = array(
					'FirstName' => $FirstName,
					'LastName' => $LastName,
					'cardNumber' => $cardNumber,
					'month' => $month,
					'year' => $year);
			
			$this->session->set_userdata($newdata);
			
			$data['main'] = 'main/summary';
			$this->load->view('template', $data);
			
		}
		
		
		

    
}

