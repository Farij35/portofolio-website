<?php
    include "dashboard/koneksi.php";
?>

<link rel="stylesheet" href="gayahobi.css">

<?php
$strSQL = "SELECT * FROM hobi";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main">
            <h3 class="pb-4 mb-4 border-bottom text-center">
                Hobi
            </h3>

            <div class="pertama row">
                <div class="sd col-md-3">
                    <p>Video Game</p>   
                </div>    
            </div>
            <div class="kedua row">
                <div class="game1 col-md-3">
                    <img src="<?= $row["gambargame1"] ?>" alt="gambargame1" class="img-thumbnail">    
                    <p><?= $row["namagame1"] ?></p> 
                </div>   
                <div class="game1 col-md-3">
                    <img src="<?= $row["gambargame2"] ?>" alt="gambargame2" class="img-thumbnail">    
                    <p><?= $row["namagame2"] ?></p> 
                </div>
                <div class="game1 col-md-3">
                    <img src="<?= $row["gambargame3"] ?>" alt="gambargame3" class="img-thumbnail">    
                    <p><?= $row["namagame3"] ?></p> 
                </div>
                <div class="game1 col-md-3">
                    <img src="<?= $row["gambargame4"] ?>" alt="gambargame4" class="img-thumbnail">    
                    <p><?= $row["namagame4"] ?></p> 
                </div>  
            </div>
            <div class="ketiga row">
                <div class="sd col-md-3">
                    <p>Railway Enthusiast</p>   
                </div>    
            </div>
            <div class="keempat row">
                <div class="kereta1 col-md-3">
                    <img src="<?= $row["kereta1"] ?>" alt="kereta1" class="img-thumbnail">    
                </div>   
                <div class="kereta2 col-md-3">
                    <img src="<?= $row["kereta2"] ?>" alt="kereta2" class="img-thumbnail">     
                </div>
                <div class="kereta3 col-md-3">
                    <img src="<?= $row["kereta3"] ?>" alt="kereta3" class="img-thumbnail">    
                </div>
                <div class="kereta4 col-md-3">
                    <img src="<?= $row["kereta4"] ?>" alt="kereta4" class="img-thumbnail">    
                </div>  
            </div>
        </div>
    </div>
</main>
<?php
    }
  }
?>