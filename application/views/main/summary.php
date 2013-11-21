<?php
echo anchor('','Back') . '<br />';
 $summary = $this->session->all_userdata();
 
 

?>




<!DOCTYPE html>
<html>
<body><h1> Summary</h1>
<form action="">
<fieldset style = "display: inline;" 	>
<legend>Movie Ticket Summary:</legend>
Movie: <input  name = 'm_date'type="text" size="16" disabled value ="<?php	echo $summary['m_movie'];?>" ><br>
Theater: <input  name = 'm_theater'type="text" size="16" disabled value ="<?php	echo $summary['m_theater'];?>"><br>
Address: <input   name = 'm_address'type="text" size="25" disabled value ="<?php	echo $summary['m_address'];?>"><br>
Time: <input   name = 'm_time'type="text" size="16" disabled value ="<?php	echo $summary['m_time'];?>"><br>
Date: <input  name = 'm_date'type="text" size="16" disabled value ="<?php	echo $summary['m_date'];?>"><br>
Seat: <input  name = 'seat'type="text"size="16"  disabled value ="<?php	echo $summary['seat'];?>"> <?php  echo ' (from left to right, start at 0) ';?> <br>
</fieldset>
<fieldset style = "display: inline;" >
<legend>Payment Summary:</legend>
First Name: <input  name = 'FirstName'type="text" size="16" disabled value ="<?php	echo $summary['FirstName'];?>"><br>
Last Name: <input  name = 'LastName'type="text"size="16"  disabled value ="<?php	echo $summary['LastName'];?>"><br>
Card Number: <input  name = 'cardNumber'type="text" size="16" disabled value ="<?php	echo $summary['cardNumber'];?>"><br>
<p >Expire Date: </p>
MM:<input name = 'month'type="text" size="16" disabled value ="<?php	echo $summary['month'];?>"><br>
YY:<input name = 'year'type="text"size="16"  disabled value ="<?php	echo $summary['year'];?>"><br>
</fieldset>
</form>
	
	
	
	



<p>Click the button to print the current page. Click on the Confirm button to make the payment.</p>

<button onclick="myFunction()">Print this page</button>
<?php echo anchor("Transaction/add_ticket", 'Confirm this info and forward to payment'); ?>
<script>
function myFunction()
{
window.print();
}
</script>

</body>
</html>
