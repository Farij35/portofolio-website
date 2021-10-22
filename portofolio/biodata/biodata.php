<?php
    include "dashboard/koneksi.php";
?>

<?php
$strSQL = "SELECT * FROM biodata";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
<main role="main" class="container">
    <div class="row">
        <aside class="col-md-3">
            <div class="p-4 p-3 p-3 mb-5 rounded">
                <img src = "<?= $row["foto"] ?>">
            </div>
        </aside>


        <div class="col-md-9 blog-main">
            <h3 class="pb-4 mb-4 border-bottom text-center">
                Biodata
            </h3>
          
            <div class="pertama row">
                <div class="nama col-md-6 text-center">
                    <p>Nama</p>   
                    <h5><?= $row["nama"] ?></h5>   
                </div>   
                <div class="ttl col-md-6 text-center">
                    <p>Tempat, Tanggal Lahir</p>   
                    <h5><?= $row["ttl"] ?></h5>   
                </div>   
            </div>
            <div class="kedua row">
                <div class="agama col-md-6 text-center">
                    <p>Agama</p>   
                    <h5><?= $row["agama"] ?></h5>   
                </div>   
                <div class="jeniskelamin col-md-6 text-center">
                    <p>Jenis Kelamin</p>   
                    <h5><?= $row["jeniskelamin"] ?></h5>   
                </div>   
            </div>
            <div class="ketiga row">
                <div class="domisili col-md-6 text-center">
                    <p>Domisili</p>   
                    <h5><?= $row["domisili"] ?></h5>   
                </div>   
                <div class="pekerjaan col-md-6 text-center">
                    <p>Pekerjaan</p>   
                    <h5><?= $row["pekerjaan"] ?></h5>   
                </div>   
            </div>
        </div>
    </div>
</main>
<?php
    }
  }
?>

