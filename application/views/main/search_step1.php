<?php
 echo anchor('','Back') . "<br />";

 
 echo "</br></br><form id='h1' action='pass_in_date'  method='post'/>
 <select name = 'date' onchange = 'this.form.submit()'>
 <option selected = 'selected' disabled = 'disabled'>Select Date</option>";
 
 if(!empty($dates_result)) {
 	for ($i = 0; $i < count($dates_result); $i++){
 		$this_date = $dates_result[$i];
 		echo "<option value ='";
 		echo $this_date;
 		echo "'>";
 		echo $this_date;
 		echo "</option>";
 	}
 }
 
echo "</select>
		</form>";
 
 



?>