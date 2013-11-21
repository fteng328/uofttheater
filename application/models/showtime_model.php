<?php
class Showtime_model extends CI_Model {

	function get_showtimes()
	{
		$query = $this->db->query("select m.title, t.name, t.address, s.date, s.time, s.available
								from movie m, theater t, showtime s
								where m.id = s.movie_id and t.id=s.theater_id");
		return $query;	
	}  

	function populate() {
		
		$movies = $this->movie_model->get_movies();
		$theaters = $this->theater_model->get_theaters();
		
		//If it returns some results we continue
		if ($movies->num_rows() > 0 && $theaters->num_rows > 0){
			foreach ($movies->result() as $movie){
				foreach ($theaters->result() as $theater){
					for ($i=1; $i < 15; $i++) {
						for ($j=20; $j <= 22; $j+=2) {
							$this->db->query("insert into showtime (movie_id,theater_id,date,time,available)
									values ($movie->id,$theater->id,adddate(current_date(), interval $i day),'$j:00',3)");
								
						}
					}		
				}				
			}
		}		
	}

	function delete() {
		$this->db->query("delete from showtime");
	}
	
	function get_showtime_id($movie, $theater, $date, $time){
		$theater = 'theater';
		$query = $this->db->query("
				select showtime.id as tid, movie.title, theater.name, showtime.date, showtime.time
				from showtime, movie, theater
				where showtime.movie_id = movie.id and
				      showtime.theater_id = theater.id and
				      movie.title = '$movie' and 
					  theater.name = '$theater' and
					  showtime.date = adddate('$date', interval 0 day) and
					  showtime.time = '$time'");
		return $query;
	}
	
	function searchByMovie($date, $movie) {
		
		$query = $this->db->query("select *
								   from showtime, movie, theater
						    	   where showtime.movie_id = movie.id and
										 showtime.theater_id = theater.id and 
				                   		 movie.title = '$movie' and 
										 showtime.date = adddate('$date', interval 0 day)");
				                   		 
		return $query;
	}
	
	function searchByLocation($date, $location) {
		
		$query = $this->db->query("select * 
								   from showtime, theater, movie
						    	   where showtime.theater_id = theater.id and
										 showtime.movie_id = movie.id and 
				                   		 theater.name = '$location' and 
										 showtime.date = adddate('$date', interval 0 day)");
				                   		 
	
				return $query;
	}
	
	function reduce_seat($showtime_id){
		$this->db->query("update showtime
						  set available = available - 1
						  where showtime.id = '$showtime_id'");
	
	}
	
	function get_all_dates(){
		$query = $this->db->query("select distinct showtime.date
							   from showtime");
		
		return $query;
	}
	
	function get_all_movies(){
		$query = $this->db->query("select distinct movie.title
								   from showtime, movie
								   where showtime.movie_id = movie.id");
		return $query;
	}
	
	function get_all_theaters(){
		$query = $this->db->query("select distinct theater.name
								   from showtime, theater
								   where showtime.theater_id = theater.id");
		return $query;
	}
	
	//$this->showtime_model->validate($date, $movie, $theater, $address, $time, $showtime_id);
	function validate($date, $movie, $theater, $time, $showtime_id){
		$query = $this->db->query("select *
								   from showtime, theater, movie
								   where showtime.movie_id = movie.id and 
										 showtime.theater_id = theater.id and
										 showtime.id = '$showtime_id' and
										 showtime.date =  adddate('$date', interval 0 day) and
										 showtime.time = '$time' and
										 movie.title = '$movie' and 
										 theater.name = '$theater' and
										 showtime.available != 0");
		return $query;
	}
}