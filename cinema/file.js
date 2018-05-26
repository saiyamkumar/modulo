 $( document ).ready(function() { 
         $("#btn").click(function(){ 
          // $("#Tab").empty();
           $.getJSON("Aggfilm.php", function(dati){
              for(var i in dati ){
               $("#Tab").append("<tr><td> Nome: "+ dati[i].Nome +"</td><td> Posti:  "+ dati[i].Posti+ "</td><td> Citta'  :"+ dati[i].Citta+ "</td></tr>"); 
              }                
           });
        });  
      });