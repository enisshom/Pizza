<!DOCTYPE html>
<html lang="en">
    

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
                  
        <title>MPS-Planning</title>
        <link rel="icon" type="image/ico" href="favicon.ico"/>
        
        <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
       
        <script type='text/javascript' src='js/plugins/jquery/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.3.custom.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.2.1.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
        <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>

        <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>

        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

        <script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>    

        <script type='text/javascript' src='js/plugins/jflot/jquery.flot.js'></script>    
        <script type='text/javascript' src='js/plugins/jflot/jquery.flot.stack.js'></script>    
        <script type='text/javascript' src='js/plugins/jflot/jquery.flot.pie.js'></script>
        <script type='text/javascript' src='js/plugins/jflot/jquery.flot.resize.js'></script>

        <script type='text/javascript' src='js/plugins/epiechart/jquery.easy-pie-chart.js'></script>    
        <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>        

        <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>

        <script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>

        <script type='text/javascript' src="js/plugins/fullcalendar/fullcalendar.min.js"></script>

        <script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>
        <script type='text/javascript' src='js/plugins/shbrush/shCore.js'></script>
        <script type='text/javascript' src='js/plugins/shbrush/shBrushXml.js'></script>
        <script type='text/javascript' src='js/plugins/shbrush/shBrushJScript.js'></script>
        <script type='text/javascript' src='js/plugins/shbrush/shBrushCss.js'></script>    

        <script type='text/javascript' src='js/plugins.js'></script>
        <script type='text/javascript' src='js/charts.js'></script>

        <script type='text/javascript' src='js/actions.js'></script>

        <style>
    td
    {
        cursor:pointer;
        background: -moz-linear-gradient(top, #ffffff, #D1E3E9);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#D1E3E9));
        text-align:center;
    }

    td:hover{
        background: -moz-linear-gradient(top, #249ee4, #057cc0);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#249ee4), to(#057cc0));
    }

    td:active
    {
        background: -moz-linear-gradient(top, #057cc0, #249ee4);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#057cc0), to(#249ee4));
    }

    #planning
    {
        margin: auto;
        float: left;
        width: 60%;
        border:3px solid #009DB2;
        padding: 10px;
    }

    
    #result:hover
    {
        margin: auto;
        float: left;
        width: 97%;
        border:5px solid #009DB2;
        padding: 10px;
        margin-top: 20px;
        background-color: red;

    }


    #result
    {
        margin: auto;
        float: left;
        width: 97%;
        border:3px solid #009DB2;
        padding: 10px;
        margin-top: 20px;
        background-color: blue;

    }


    #operateurs
    {
        margin: auto;
   
        height: auto;
       float: right;
       margin-top: -153px;
    }

   

    .current 
    {
    width: auto; height: auto; margin: 5px;border:2;
    }

    
    table#list,.mouved table
    {
        width: 90px;
        height: 25px;
    }

    table#list, table##list td, table#list th ,
    .mouved table, .mouved td
    {
        border-collapse: collapse;
        border: 1px solid gray;
        padding: 5px;
        width: 90px;
        margin-top: 10px;
    }
    #list td
    {
        cursor: move;
    }
    table th
    {
        background:#E6E6E6;
    }

    tr.disabled ui-droppable
    {
        background-color:#FEE0C6;
        cursor:not-allowed;
    }
    table tr:hover:not(.disabled)
    {
    background-color:#ECF1EF;
    }



</style>
    </head>
    <body>    
        <div id="loader"><img src="img/loader.gif"/></div>
        <div class="wrapper">

          

            <div class="body">
                    <center>
                <ul class="navigation">
                    <li>
                        <a href="google.com" class="button">
                            <div class="icon">
                                <span class="ico-group"></span>
                            </div>                    
                            <div class="name">Operateurs</div>
                        </a>                
                    </li>
                   
                   <li>
                        <a href="#" class="button">
                            <div class="icon">
                                <span class="ico-cogs-2"></span>
                            </div>                    
                            <div class="name">Machines</div>
                        </a>                
                    </li>
                    <li>
                        <a href="#"  class="button">
                            <div class="icon">
                                <span class="ico-calendar"></span>
                            </div>                    
                            <div class="name">Planning</div>
                        </a>                
                    </li>
                    <li>
                        <a href="#" class="button">
                            <div class="icon">
                                <span class="ico-archive"></span>
                            </div>                    
                            <div class="name">Historique</div>
                        </a>                
                    </li>
                  

                </ul>

                            </center>

        </div>

        <div class="dialog" id="source" style="display: none;" title="Source"></div>

        <div id="fcAddEvent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="fcAddEventLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="fcAddEventLabel">Add new event</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">Title:</div>
                    <div class="col-md-9"><input class="form-control" type="text" id="fcAddEventTitle"/></div>
                </div>
            </div>
            <div class="modal-footer">            
                <button class="btn btn-primary" id="fcAddEventButton">Add</button>            
            </div>
        </div> 


        <script>



      $(document).ready(function(){

        $('#myTable').find('td#oper').on('dblclick',function(){

            //alert($(this).html());
            
            

            if ($(this).html()=='') {
                   //alert('sqsqsqs');
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
                alert($('#debut').val());

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
        });

        $("#result").droppable({
            drop: function (event, ui) {
                //var td=ui.draggable).text();
                $(this).html('vide');
                //$(ui.draggable).remove();
                //$(ui.draggable).appendTo(this);
                
                //alert('result');
                 // alert( ' was draged from ' + sourceElement + ' to ' + $(this).attr('id') + '.');
    
            }
        });



        
    });

   
        });

    
                                     
  </script>
</head>
<body>


</br></br>

<div class="container">

<div class="page-header">
    <div class="wrap-title">
        <div class="icon">
            <span class="ico-calendar"></span>
        </div>
        <h1>Planning </h1>
    </div>
 <div class="clear"></div>
</div>



<div class="row-form">

   <div class="col-md-2 col-md-offset-4"> <div class="col-md-3">Debut:</div><input type="text" id='debut' class="form-control datepicker" value="2015-08-04"></div>
    <div class="col-md-2"> <div class="col-md-3">Fin:</div><input type="text" id='fin' class="form-control datepicker" value="2015-08-04"></div>                                                                    
</div>
<div class="col-md-10">
                                    <table id="myTable"  cellpadding="1" cellspacing="1" width="60%" class="table">
                            
                            <tr><td class=disabled> </td><td class=disabled>maaaaaac 1</td><td class=disabled> maaaaaaac 2</td><td class=disabled>maaaaaaac 3</td></tr><tr><td class=disabled>M</td><td id="oper" >ahmed</td><td id="oper" >Mohssine</td><td id="oper" >Jamal</td></tr><tr><td class=disabled>A</td><td id="oper" >Mohamed</td><td id="oper" >Aissa</td><td id="oper" >Fouad</td></tr><tr><td class=disabled>S</td><td id="oper" >Hicham</td><td id="oper" >walid</td><td id="oper" >Hamza</td></tr>                            
                    </table>
                                </div>

                                
                                </br></br>

                                 <div class="col-md-8">
                                    
                                    <table    id="list" cellpadding="1" cellspacing="1" width="100%" class="table"> 
                       
                            <tr > 
                                <td id="name">ahmed</td> 
                                
                            
                            
                                <td>Mohamed</td> 
                               
                           
                                <td>Hamza</td> 
                            
                                <td>Aissa</td> 
                               
                           
                                <td>Mohssine</td> 
                               
                           
                                <td>walid</td> 
                               
                          
                                <td>Hicham</td> 
                               
                            
                                <td>Fouad</td> 
                               
                             
                                <td>Jamal</td> 

                               
                            </tr> 
                       
                    </table> 
                                </div>   
                                
                                
                                                
                            </div>

                           
</div>






    


</div>
 


    </body>


</html>
