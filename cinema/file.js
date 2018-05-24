 $( document ).ready(function() { 
         $("#btn").click(function(){   
            
               $("#Film").empty(); 
               $("#desc1").empty(); 

             $.getJSON(""+
                       document.getElementById("Film1").value+"&APPID=cbb66fca5bfbd660a53e23ad1f70180d", function(dati){
              
               $("#main").append( dati.Titolo + "<br>"); 
               $("#desc").append( dati.Genere+ "<br>"); 
                           
           });
        });  
      }); 