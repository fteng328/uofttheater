<?php
class ticket_model extends CI_Model {

	function get_tickets()
	{
		$query = $this->db->query("select first, last, creditcardnumber, creditcardexpiration, showtime_id, seat, movie.title, theater.name, showtime.date, showtime.time
								   from ticket, showtime, movie, theater
								   where ticket.showtime_id = showtime.id and
									     showtime.movie_id = movie.id and
										 showtime.theater_id = theater.id");
		return $query;	
	}  

	function add_ticket($showtime_id, $first_name, $last_name, $card_number, $card_expr, $seat){
		$this->db->query("insert into ticket (first,last,creditcardnumber,creditcardexpiration,showtime_id, seat)
									values ('$first_name','$last_name','$card_number','$card_expr','$showtime_id', '$seat')");
	}

	function delete() {
		$this->db->query("delete from ticket");
	}
	
	function get_seats_taken($showtime_id){
		$query = $this->db->query("select seat as seat_id
								   from ticket
								   where ticket.showtime_id = '$showtime_id'");
		
		return $query;
	}
	
	//$this->ticket_model->validate_seat($showtime_id, $seat);
	function validate_seat($showtime_id, $seat){
		$query = $this->db->query("select *
								  from ticket
								  where ticket.showtime_id = '$showtime_id' and
										ticket.seat = '$seat'");
		return $query;
	}
}