<?php
    include "dashboard/koneksi.php";
?>

<?php
$strSQL = "SELECT * FROM pendidikan";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main">
            <h3 class="pb-4 mb-4 border-bottom text-center">
                Pendidikan
            </h3>

            <div class="pertama row">
                <div class="sd col-md-6 text-center">
                    <p>Sekolah Dasar</p>   
                    <h5><?= $row["sd"] ?></h5>  
                    <p><?= $row["tahunsd"] ?></p> 
                </div>   
                <div class="smp col-md-6 text-center">
                    <p>Sekolah Menengah Pertama</p>   
                    <h5><?= $row["smp"] ?></h5> 
                    <p><?= $row["tahunsmp"] ?></p>  
                </div>   
            </div>
            <div class="kedua row">
                <div class="smk col-md-6 text-center">
                    <p>Sekolah Menengah Kejuruan</p>   
                    <h5><?= $row["smk"] ?></h5>
                    <p><?= $row["jurusansmk"] ?></p>  
                    <p><?= $row["tahunsmk"] ?></p> 
                </div>   
                <div class="universitas col-md-6 text-center">
                    <p>Universitas</p>   
                    <h5><?= $row["kuliah"] ?></h5>
                    <p><?= $row["jurusankuliah"] ?></p>  
                    <p><?= $row["tahunkuliah"] ?></p>    
                </div>   
            </div>
        </div>
    </div>
</main>
<?php
    }
  }
?>