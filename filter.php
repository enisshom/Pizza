<?php
include "config.php";
$mac = $_POST['mac'];
$time = $_POST['time'];


if($mac != null && $time != null  ){
//$stmt = $conn->prepare("SELECT nom_operateur FROM operateurs   ");
//$stmt->bind_param('ss',$mac, $time);
//$stmt->fetch();

if(1==1){
?>
 <table    id="list" cellpadding="3" cellspacing="3" width="100%" class="table"> 
                       
            <?php  

                       $operateur = sqlQuery("SELECT nom_operateur FROM operateurs where nom_operateur  not in  
											(select nom_operateur from programme where heur ='".$time."' or machine='".$mac."' )");

                      $coll=10;

                                        echo ' <tr> ';
                                       
                                        foreach ($operateur as $operateur => $oper)
	                            				 {
	                            				 	if ($coll>=0) {
	                            				 		echo '<td>'.$oper[0].'</td>';
	                            				 		$coll--;


	                            				 	} 
	                            				 	else 
	                            				 	{
	                            				 		echo '<td>'.$oper[0].'</td>';
	                            				 		echo '</tr> <tr> ';
	                            				 		$coll=10;
	                            				 	}

	                            				 	

													
						                       	 }
						                echo '</tr>';       	 

                                        
                                   
                             
                               
             ?>  
                       
                    </table> 
                    <?php echo $time." ".$mac ?>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Maaf terjadi kesalahan, data error.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Isi semua form area.
</div>
<?php
}
?>