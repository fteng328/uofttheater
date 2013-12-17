<?php

$summary = $this->session->all_userdata();



?>



<form action="go_to_summary">
<fieldset>
<legend>Movie Ticket Summary:</legend>
Movie: <input name = 'm_date'type="text" disabled value ="<?php	echo $summary['m_movie'];?>" ><br>
Theater: <input name = 'm_theater'type="text" disabled value ="<?php	echo $summary['m_theater'];?>"><br>
Address: <input name = 'm_address'type="text" disabled value ="<?php	echo $summary['m_address'];?>"><br>
Time: <input name = 'm_time'type="text" disabled value ="<?php	echo $summary['m_time'];?>"><br>
Date: <input name = 'm_date'type="text" disabled value ="<?php	echo $summary['m_date'];?>"><br>
Seat: <input name = 'seat'type="text" disabled value ="<?php	echo $summary['seat'];?>"> 
<?php  echo ' (from left to right, start at 0) ';?> <br>
</fieldset>
<fieldset>
<legend>Payment Summary:</legend>
First Name: <input name = 'FirstName'type="text" disabled value ="<?php	echo $summary['FirstName'];?>"><br>
Last Name: <input name = 'LastName'type="text" disabled value ="<?php	echo $summary['LastName'];?>"><br>
Card Number: <input name = 'cardNumber'type="text" disabled value ="<?php	echo $summary['cardNumber'];?>"><br>
<p>Expire Date: </p>
MM:<input name = 'month'type="text" disabled value ="<?php	echo $summary['month'];?>"><br>
YY:<input name = 'year'type="text" disabled value ="<?php	echo $summary['year'];?>"><br>
</fieldset>
<div><input type="submit" value="Submit" /></div>
</form>
	
	
