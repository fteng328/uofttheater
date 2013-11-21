<?php
echo anchor('','Back') . '<br />';

if(!empty($search_result)) {

	echo '<table border ="1" id="display" > ';
	echo '<caption>Movies Avaliable</caption>';
	echo '<tr>
<th>date</th>
<th>title</th>
<th>venue</th>
<th>address</th>
<th>time</th><th>avaliable seats</th><th>selection</th>
</tr>';
	
	for ($i = 0; $i < count($search_result); $i++){
		echo '<tr><td>';
		echo $search_result[$i][0];
		echo '</td>';

		echo '<td align="center">';		
		echo $search_result[$i][1];
		echo '</td>';

		echo '<td align="center">';	
		echo $search_result[$i][2];
				echo '</td>';

		echo '<td align="center">';		
		echo $search_result[$i][3];
				echo '</td>';

		echo '<td align="center">';		
		echo $search_result[$i][4];
				echo '</td>';
		echo '<td align="center">';		
		echo $search_result[$i][5];
				echo '</td>';

		
		$date = $search_result[$i][0];
		$title = $search_result[$i][1];
		$venue = $search_result[$i][2];
		$address = $search_result[$i][3];
		$time = $search_result[$i][4];
	
		echo '<form action="mark_ticket" method = "post">
				<input type = "hidden"  name = "date" value = "';
		echo $date;
		echo '" >';
		echo '<input type = "hidden"  name = "theater" value = "';
		echo $venue;
		echo '" >';
		echo '<input type = "hidden"  name = "movie" value = "';
		echo $title;
		echo '" >';
		echo '<input type = "hidden"  name = "address" value = "';
		echo $address;
		echo '" >';
		echo '<input type = "hidden"  name = "time" value = "';
		echo $time;
		echo '" >';
		echo '<td>';
		echo '<button >choose this</button>';
		echo '</td>';
		echo '<br/>'; 
		echo '</form>';
		echo '</tr>';
	}
	echo ' </table>';
};
	


?>
