<?php

class Transaction extends CI_Controller {


	function __construct() {
		// Call the Controller constructor
		parent::__construct();
	}

	function index() {
		$data['main']='main/index';
		$this->load->view('template', $data);
	}
	
	
	
	function add_ticket(){
		

		$this->load->model('ticket_model');
		$this->load->model('showtime_model');
		
		$all_info = $this->session->all_userdata();
		
		$date = $all_info['m_date'];
		$movie = $all_info['m_movie'];
		$theater = $all_info['m_theater'];
		$time = $all_info['m_time'];
		$seat = $all_info['seat'];
		
		$showtime_id = $all_info['showtime_id'];
		$first_name = $all_info['FirstName'];
		$last_name = $all_info['LastName'];
		$card_number = $all_info['cardNumber'];
		$expr_year = $all_info['year'];
		$expr_month = $all_info['month'];
		$expr = $expr_month . $expr_year;
		$seat = $all_info['seat'];		
		
		$v1_result = $this->showtime_model->validate($date, $movie, $theater, $time, $showtime_id);
		
		
		$v2_result = $this->ticket_model->validate_seat($showtime_id, $seat);
		
		echo $v1_result->num_rows();
		echo $v2_result->num_rows();
		
		if($v1_result->num_rows() > 0){
			if($v2_result->num_rows() == 0){
				$result_2 = true;
			}else{
				$result_2 = false;
			}
		}
		else{
			$result_2 = false;
		}
		
		
		if($result_2){
			$this->ticket_model->add_ticket($showtime_id, $first_name, $last_name, $card_number, $expr, $seat);
			$this->showtime_model->reduce_seat($showtime_id);
			redirect('', 'refresh');
		}
		else{
			echo '123';
			$data['main'] = 'main/validation_fail';
			$this->load->view('template', $data);
		}
		
	}
	

	
	
}