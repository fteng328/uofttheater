<?php
echo anchor('','Back') . "<br />";


$cache = array(0, 0, 0);
$i = 0;

foreach ($seats_cache as $temp){
	if($temp != 0){
		$cache[$i] = 2;
	}
	$i = $i + 1;
}

$seat1 = $cache[0];
$seat2 = $cache[1];
$seat3 = $cache[2];

?>



<!DOCTYPE html>
<html>
  <head> 
    <script type="text/javascript"> 
      var exist = -1;
      var index = [<?php echo $seat1 ?>, <?php echo $seat2 ?>, <?php echo $seat3 ?>];
      
      function invoke_1(){
    	  change(0);
      }
      function invoke_2(){
    	  change(1);
      }
      function invoke_3(){
    	  change(2);
      }
      
      function change(choice) {
          
    	  switch (choice){
    	  case 0:
    		  var gp = document.getElementById("pic01");
    		  break;
    	  case 1:
    		  var gp = document.getElementById("pic02");
    		  break;
    	  case 2:
    		  var gp = document.getElementById("pic03");
    		  break;
    	  }
    	  if( index[choice] == 0){
        	  if (exist == -1){
            	  gp.src = "http://s5.postimg.org/zf5fnw72r/Box_Green.png";
            	  index[choice] = 1;
            	  exist = choice;
            	  get_seat_info(); 
            	  }
        	  else{
        		  change(exist);
        		  index[exist] = 0;
        		  gp.src = "http://s5.postimg.org/zf5fnw72r/Box_Green.png";
        		  index[choice] = 1;
        		  exist = choice; 
        		  get_seat_info(); 
        	  }
          }
          else{
        	  if ( index[choice] == 1){
        		  gp.src = "http://s5.postimg.org/7962710ib/new.png";
        		  index[choice] = 0;
        		  exist = -1;
        		  }
        	  };
      }
      
  
      function get_seat_info(){
    	  $('.myinput').val(index);
      }

      function set_seat(){
          for (var i = 0; i<3; i++){
              if ( index[i] == 1 ){
                  document.getElementById("get").value = i;
              };
              };
        }
          
    </script>
  </head>
  <body> 
  
    <div style='height: 70px;  width: 90px; float : left;'>
    <img src='http://s5.postimg.org/<?php if($seat1 == 0){echo '7962710ib/new';} else{echo 'i39og72z7/Box_Yellow';}?>.png' id='pic01' style='position: absolute;' onclick='invoke_1(event);' />
    </div>
    

    	
	
    <div style='height: 70px;  width: 50px;float:left;'>
    <img src='http://s5.postimg.org/<?php if($seat2 == 0){echo '7962710ib/new';} else{echo 'i39og72z7/Box_Yellow';}?>.png' id='pic02' style='position: absolute;' onclick='invoke_2(event);' />
    </div>
    
    <div style='float:left;height: 50px;  width: 64px;'>
    <img src='http://s5.postimg.org/<?php if($seat3 == 0){echo '7962710ib/new';} else{echo 'i39og72z7/Box_Yellow';}?>.png' id='pic03' style='position: absolute;' onclick='invoke_3(event);' />
    </div>
  </body>
  
  
  
  <form action="go_to_payment" method = "post">
<input type = "hidden" id='get' class="myinput" name = 'seat' value = "dsa" >
<button onclick ="set_seat();">set seat</button>

  </form>
  
  
</html>  


<?php 


?>
