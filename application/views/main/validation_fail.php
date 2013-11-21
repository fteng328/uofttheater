<?php
echo anchor('','Back') . "<br />";

echo validation_errors();
echo "You have failed the validation!!!";
echo "<br/>";
echo "Please restart to purchase a ticket!!!";


$this->session->sess_destory();