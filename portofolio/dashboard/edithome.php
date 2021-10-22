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
            <a href="dashhome.php" class="btn btn-info" role="button">Kembali</a>
            </span>
        </div> 
    </div>  
<?php
include "koneksi.php";
include "fungsi.php";
$id = $kalimat1 = $kalimat2 = $gambar = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = bersihkan_input($_POST['id']);
    $kalimat1 = bersihkan_input($_POST['kalimat1']);
    $kalimat2 = bersihkan_input($_POST['kalimat2']);
    $gambar = bersihkan_input($_POST['gambar']);

    $strSQL = "UPDATE jumbotron SET kalimat1='$kalimat1', kalimat2='$kalimat2', gambar='$gambar' WHERE id='$id'";
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
        $strSQL = "SELECT * FROM jumbotron WHERE id='$id'";
        $execStrSQL = mysqli_query($conn, $strSQL);
        if(mysqli_num_rows($execStrSQL)){
            while($row = mysqli_fetch_assoc($execStrSQL)){
                $kalimat1 = $row['kalimat1'];
                $kalimat2 = $row['kalimat2'];
                $gambar = $row['gambar'];
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
                <td>Kalimat 1</td>        
                <td><input type="text" class="form-control" name="kalimat1" value="<?= $kalimat1 ?>"></td>       
            </tr>
            <tr>
                <td>Kalimat 2</td>        
                <td><input type="text" class="form-control" name="kalimat2" value="<?= $kalimat2 ?>"></td>       
            </tr>
            <tr>
                <td>Gambar</td>        
                <td><input type="text" class="form-control" name="gambar" value="<?= $gambar ?>"></td>       
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