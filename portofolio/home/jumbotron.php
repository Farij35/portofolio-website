<?php
    include "dashboard/koneksi.php";
?>

<div class="jumbotron position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-light">
<?php
$strSQL = "SELECT * FROM jumbotron";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
    <div class="col-md-5 p-lg-5 my-5">  
        <h1 class="display-4 fw-normal"><?= $row["kalimat1"] ?></h1>
        <p class="lead fw-normal"><?= $row["kalimat2"] ?></p>
        <a class="btn btn-outline-secondary" href="../hubungi/hubungi.php">
            Hubungi Saya
        </a>
    </div>
    <img src="<?= $row["gambar"] ?>" class="d-none d-md-block" alt="Responsive image"> 
<?php
    }
  }
?>
</div>
