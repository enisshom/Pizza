       

        

      
<script>

            function load_page(page){

                     
                       $(".container").load(page+".php");
                            
                       return false;
                 }


      $(document).ready(function(){


      	 $("#myTable td .oper, #myTable td:not(.disabled)").on('click',function()

      	 {

      	 	var col = parseInt( $(this).index() );
            var row = parseInt( $(this).parent().index() );
            var ma = $('#myTable tr:eq(' + 0 + ') td:eq(' + col + ')');
            var  ti = $('#myTable tr:eq(' + row + ') td:eq(' + 0 + ')');
            var ma_ = ma.text();
            var ti_ = ti.text();
            //alert(ma_+' '+ti_);
 			var datas ="time="+ti_+"&mac="+ma_;
                

                $.ajax({
                       type: "POST",
                       url: "filter.php",
                       data: datas
                    }).done(function( data ) {
                      //$('.col-md-8').append(data);
         
                 //alert('work');
                     // viewdata();
                   });


      	 });
        

        $('#myTable').find('td#oper').on('dblclick',function(){

           
            
            

            if ($(this).html()=='') {
                   alert('C\'est deja vide');
                } else 
                {
                   
                //var $element=$('<tr id="name"><td class="ui-draggable ui-draggable-handle">');
                  var sourceElement;
                   $('<td class="ui-draggable ui-draggable-handle">'+$(this).html()+'</td>').insertAfter("#list tr td:first");
                $('#list tr').find('td').draggable({
                        helper: 'clone',
                        revert: 'invalid',
                        start: function (event, ui) {
                            $(this).css('opacity', '.5');
                            sourceElement = $(this).closest('table').attr('id');
                            
                        },
                         stop: function (event, ui) {
                        $(this).css('opacity', '1');
                        //alert('hani');
                    }
                });
                        
                 
                   $(this).html('');

                }


        });



     $(function () {
     var sourceElement;
     $("#list td").draggable({
            helper: 'clone',
            revert: 'invalid',
            start: function (event, ui) {
                $(this).css('opacity', '.5');
                sourceElement = $(this).closest('table').attr('id');
                
            },
            stop: function (event, ui) {
                $(this).css('opacity', '1');
                //alert('hani');
            }
        });
    
        $("#myTable td .oper, #myTable td:not(.disabled)").droppable({
            drop: function (event, ui) {

            	
				if ($(this).html()=='') 
				{
					  var column_num = parseInt( $(this).index() );
            var row_num = parseInt( $(this).parent().index() );

            var machine = $('#myTable tr:eq(' + 0 + ') td:eq(' + column_num + ')');
            var  time = $('#myTable tr:eq(' + row_num + ') td:eq(' + 0 + ')');

            var classid = ui.helper.find('tr').attr('id');
            var name = ui.helper.find('tr').find('td#name').text();

            var operateur_ = $(ui.draggable).text();
            var machine_ = machine.text();
            var heur_ = time.text();
            var debut = $('#debut').val();
            var fin = $('#fin').val();
            var datas ="operateur="+operateur_+"&machine="+machine_+"&heur="+heur_+"&from="+debut+"&to="+fin;
                //alert($('#debut').val());

                $.ajax({
                       type: "POST",
                       url: "insert.php",
                       data: datas
                    }).done(function( data ) {
                      //$('').append(data);
                      //viewdata();
                    });


                $(this).html((ui.draggable).text());
                $(ui.draggable).remove();

				}
					else
				{
					alert('Cette cellule est déjà remplie')
				};
            	
                
          
               
    
            }
        });

        $("#result").droppable({
            drop: function (event, ui) {
                
                $(this).html('vide');
                
    
            }
        });



        
    });

   
        });
 </script>


<div class="container">

<div class="page-header">
    <div class="wrap-title">
        <div class="icon">
            <span class="ico-calendar"></span>
        

        </div>
        <h1>Nouveau planning  </h1>
    </div>
 <div class="clear"></div>
</div>


<div class="container-fluid">
<div class="row">

   <div class="col-md-2 col-md-offset-4"> <div class="col-md-3">Debut:</div><input type="text" id='debut' class="form-control datepicker" value="2015-08-04"></div>
    <div class="col-md-2"> <div class="col-md-3">Fin:</div><input type="text" id='fin' class="form-control datepicker" value="2015-08-04"></div>                                                                    
</div>
<div class="row">
<div class="col-md-8">
       <table id="myTable"  cellpadding="3" cellspacing="3" width="60%" class="table">
                            
                            <?php

                                include "config.php";
                                //$machines = $conn->query("select ref_mac  from machines");
                               
                                 $num_rows = $conn->prepare("select count(*) from programme");
                               //$machines = array (" ","maaaaaac 1"," maaaaaaac 2","maaaaaaac 3");
                                 $times = array (" ","M","A","S");

                               $machines = sqlQuery('SELECT * FROM machines');
                                 array_unshift($machines, " ");
                                //print($machines[0][0]);

                                foreach ($times as $time => $tm)
                                    {

                                        echo '<tr>';
                                       
                                        foreach ($machines as $mac => $mc )
                                         {
                                            if ($tm==" ") 
	                                                     {
	                                                        
	                                                         
	                                                           echo '<td class=disabled>'.$mc[1].'</td>';
	                                                           
	                                                      }
                                                  
                                           elseif ($mc[0]==" ") 
		                                                  {
		                                                    echo '<td class=disabled>'.$tm.'</td>';
		                                                    
		                                                  }
		                                                  else  
		                                                  {
		                                                    $operateur = sqlQuery("select * from programme where machine='$mc[1]' and heur='$tm'");
		                                                                   
		                                                    print '<td id="oper" >'.$operateur[0][1].'</td>';
		                                                    //print '<td id="oper" ></td>';
		                                                              
		                                                        
		                                                  }
                                                      
                                        	}

                                        echo '</tr>';
                                    }
                                    
                            ?>
                            
                    </table>
                                </div>

                                
                                
                                 <div class="col-md-4">
                                 </br></br>
                                    
                                    <table    id="list" cellpadding="3" cellspacing="3" width="100%" class="table"> 
                       
                       <?php  

                       	 $operateur = sqlQuery('SELECT * FROM operateurs ');

                      $coll=10;

                                        echo ' <tr> ';
                                       
                                        foreach ($operateur as $operateur => $oper)
	                            				 {
	                            				 	if ($coll>=0) {
	                            				 		echo '<td>'.$oper[1].'</td> ';
	                            				 		$coll--;


	                            				 	} 
	                            				 	else 
	                            				 	{
	                            				 		echo '<td>'.$oper[1].'</td> ';
	                            				 		echo '</tr> <tr> ';
	                            				 		$coll=10;
	                            				 	}

	                            				 	

													
						                       	 }
						                echo '</tr>';       	 

                                        
                                   
                             
                               
                          ?>  
                       
                    </table> 
                                </div>  
                                </div> 
                                </div> 
                                
                                
                                                
                            </div>

                           
</div>






    


</div>