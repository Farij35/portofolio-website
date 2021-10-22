<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

<?php include_once "menu.php"; ?>

<div class="container">
    <h2>Input Kalimat</h2>
    <div class="row mb-2">
        <div class="col-sm-12">    
            <span class="m-1">                
            <a href="dashbiodata.php" class="btn btn-info" role="button">Kembali</a>
            </span>
        </div> 
    </div>  
<?php
include "koneksi.php";
include "fungsi.php";
$id = $nama = $ttl = $agama = $jeniskelamin = $domisili = $pekerjaan = $foto = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = bersihkan_input($_POST['id']);
    $nama = bersihkan_input($_POST['nama']);
    $ttl = bersihkan_input($_POST['ttl']);
    $agama = bersihkan_input($_POST['agama']);
    $jeniskelamin = bersihkan_input($_POST['jeniskelamin']);
    $domisili = bersihkan_input($_POST['domisili']);
    $pekerjaan = bersihkan_input($_POST['pekerjaan']);
    $foto = bersihkan_input($_POST['foto']);

    $strSQL = "UPDATE biodata SET nama='$nama', ttl='$ttl', agama='$agama', jeniskelamin='$jeniskelamin', domisili='$domisili', pekerjaan='$pekerjaan', foto='$foto' WHERE id='$id'";
    //echo "Query = ".$strSQL;
    $execStrSQL = mysqli_query($conn, $strSQL);
    if($execStrSQL){
?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b>Data Berhasil</b> diubah
        </div>

<?php
    }
    else {
?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b>Data Tidak Berhasil</b> diubah<br>
            <?php echo "Error: ".$execStrSQL. "<br>".mysqli_error($conn);?>
        </div>

<?php
    }
}
else {
    if(isset($_GET['id'])){
        $id = bersihkan_input($_GET['id']);
        $strSQL = "SELECT * FROM biodata WHERE id='$id'";
        $execStrSQL = mysqli_query($conn, $strSQL);
        if(mysqli_num_rows($execStrSQL)){
            while($row = mysqli_fetch_assoc($execStrSQL)){
                $nama = $row['nama'];
                $ttl = $row['ttl'];
                $agama = $row['agama'];
                $jeniskelamin = $row['jeniskelamin'];
                $domisili = $row['domisili'];
                $pekerjaan = $row['pekerjaan'];
                $foto = $row['foto'];
            }
        }
    }
}
?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">        
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th><input type="text" class="form-control" name="id" value="<?= $id ?>" readonly></th>       
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama</td>        
                <td><input type="text" class="form-control" name="nama" value="<?= $nama ?>"></td>       
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>        
                <td><input type="text" class="form-control" name="ttl" value="<?= $ttl ?>"></td>       
            </tr>
            <tr>
                <td>Agama</td>        
                <td><input type="text" class="form-control" name="agama" value="<?= $agama ?>"></td>       
            </tr>
            <tr>
                <td>Jenis Kelamin</td>        
                <td><input type="text" class="form-control" name="jeniskelamin" value="<?= $jeniskelamin ?>"></td>       
            </tr>
            <tr>
                <td>Domisili</td>        
                <td><input type="text" class="form-control" name="domisili" value="<?= $domisili ?>"></td>       
            </tr>
            <tr>
                <td>Pekerjaan</td>        
                <td><input type="text" class="form-control" name="pekerjaan" value="<?= $pekerjaan ?>"></td>       
            </tr>
            <tr>
                <td>Foto</td>        
                <td><input type="text" class="form-control" name="foto" value="<?= $foto?>"></td>       
            </tr>
        </tbody>
    </table>
    <div class="row mb-2">
        <div class="col-sm-12">    
            <span class="m-1">                
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </span>
        </div> 
    </div>
    </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>
</html>