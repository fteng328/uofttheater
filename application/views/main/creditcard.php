<?php echo validation_errors(); ?>
<script type="text/javascript">
<!--validate the experiation date on the card 
//-->

function validateEXP(){
	
	var year = document.getElementById("expireYY");
	var month = document.getElementById("expireMM");
	var b = year.value;
	var a = month.value;
	var str=new Date().getFullYear()+'';
	str= str.match(/\d{2}$/);
	var current_month = new Date().getMonth() + 1;
	if (b >= str+1) {
		return true;}
	else{
		if (b==str && a >= current_month)
			return true;
		alert("~~~credit card has expired! please use a new credit card!");
		return false;}
}




</script>


<form name="input" action="go_to_summary" onsubmit="return validateEXP()" method="post">

<fieldset>


First name: <input type="text" size="16" name="FirstName" value="<?php echo set_value('FirstName'); ?>" required	><br>
Last name: <input type="text" size="16" name="LastName" value="<?php echo set_value('LastName'); ?>" required><br>
Credit Card Number: <input type="text" size="16" name='cardNumber' required pattern = "\d{16}" title = "Credit card number must have 16 digits">
MM:<input type="text" size="3" id='expireMM' name = "Month" required pattern = "0[1-9]|1[0-2]" title = "expire month must be 2 digits from 01-12 " style='display:inline;'>
YY:<input type="text" size="3" id='expireYY' name =  "Year" required pattern = "\d{2}"  title = "expire month must be 2 digits"  style="display:inline;"	>
<!-- 
<select name="Month" >
<option selected="selected">MM</option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>

</select>

<select name="Year">
<option selected="selected">YY</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
</select>
<input type="Month" required>

Card Expiration:
<select name='Month' id='expireMM' >
    <option value=''>Month</option>
    <option value='01'>Janaury</option>
    <option value='02'>February</option>
    <option value='03'>March</option>
    <option value='04'>April</option>
    <option value='05'>May</option>
    <option value='06'>June</option>
    <option value='07'>July</option>
    <option value='08'>August</option>
    <option value='09'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
</select> 
<select name='Year' id='expireYY' >
    <option value=''>Year</option>
    <option value='10'>2010</option>
    <option value='11'>2011</option>
    <option value='12'>2012</option>
</select> 
<input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>
-->

<input type="submit" value="Submit" >
</fieldset>
</form> 
 
