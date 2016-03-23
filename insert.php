<?php
include "config.php";
$oper = $_POST['operateur'];
$mac = $_POST['machine'];
$heur = $_POST['heur'];
$debut = $_POST['from'];
$fin = $_POST['to'];

if($oper != null && $mac != null && $heur != null ){
$stmt = $conn->prepare("INSERT INTO programme VALUES (NULL,?,?,?,?,?)");
$stmt->bind_param('sssss', $oper, $mac, $heur, $debut , $fin);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Anda berhasil menambah data.
</div>
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