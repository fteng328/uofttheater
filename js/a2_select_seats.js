
      var exist = -1
      var index = [0, 0, 2]
      
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
    		  var gp = document.getElementById('pic01');
    		  break;
    	  case 1:
    		  var gp = document.getElementById('pic02');
    		  break;
    	  case 2:
    		  var gp = document.getElementById('pic03');
    		  break;
    	  }
    	  if( index[choice] == 0){
        	  if (exist == -1){
            	  gp.src = 'http://s5.postimg.org/zf5fnw72r/Box_Green.png';
            	  index[choice] = 1;
            	  exist = choice;
            	  }
        	  else{
        		  change(exist);
        		  index[exist] = 0;
        		  gp.src = 'http://s5.postimg.org/zf5fnw72r/Box_Green.png';
        		  index[choice] = 1;
        		  exist = choice;  
        	  }
          }
          else{
        	  if ( index[choice] == 1){
        		  gp.src = 'http://s5.postimg.org/vu9k4o2j7/Box_Blue.png';
        		  index[choice] = 0;
        		  exist = -1;
        		  }
        	  };
      }