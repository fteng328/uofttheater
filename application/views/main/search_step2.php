<?php
 
 echo anchor('','Back') . "<br />";

 
 echo "select movie";
 
 echo "</br></br><form id='h1' action='search_by_movie'  method='post'/>
<select name = 'movie' onchange = 'this.form.submit()'>
<option selected = 'selected' disabled = 'disabled'>Select Movie</option>";

 
 if(!empty($movies_result)) {
 	for ($i = 0; $i < count($movies_result); $i++){
 		$this_movie = $movies_result[$i];
 		echo "<option value ='";
 		echo $this_movie;
 		echo "'>";
 		echo $this_movie;
 		echo "</option>";
 	}
 }
 
 echo "</select>
		</form>";
 
 


 echo "select venue";
 
 echo "</br></br><form id='h1' action='search_by_venue'  method='post'/>
<select name = 'venue' onchange = 'this.form.submit()'>
<option selected = 'selected' disabled = 'disabled'>Select Venue</option>";
 
 
 if(!empty($theaters_result)) {
 	for ($i = 0; $i < count($theaters_result); $i++){
 		$this_theater = $theaters_result[$i];
 		echo "<option value ='";
 		echo $this_theater;
 		echo "'>";
 		echo $this_theater;
 		echo "</option>";
 	}
 }
 
 echo "</select>
		</form>";
 




?>