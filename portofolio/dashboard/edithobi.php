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
            <a href="dashhobi.php" class="btn btn-info" role="button">Kembali</a>
            </span>
        </div> 
    </div>  
<?php
include "koneksi.php";
include "fungsi.php";
$id = $namagame1 = $gambargame1 = $namagame2 = $gambargame2 = $namagame3 = $gambargame3 = $namagame4 = $gambargame4 = $kereta1 = $kereta2 = $kereta3 = $kereta4 = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = bersihkan_input($_POST['id']);
    $namagame1 = bersihkan_input($_POST['namagame1']);
    $gambargame1 = bersihkan_input($_POST['gambargame1']);
    $namagame2 = bersihkan_input($_POST['namagame2']);
    $gambargame2 = bersihkan_input($_POST['gambargame2']);
    $namagame3 = bersihkan_input($_POST['namagame3']);
    $gambargame3 = bersihkan_input($_POST['gambargame3']);
    $namagame4 = bersihkan_input($_POST['namagame4']);
    $gambargame4 = bersihkan_input($_POST['gambargame4']);
    $kereta1 = bersihkan_input($_POST['kereta1']);
    $kereta2 = bersihkan_input($_POST['kereta2']);
    $kereta3 = bersihkan_input($_POST['kereta3']);
    $kereta4 = bersihkan_input($_POST['kereta4']);

    $strSQL = "UPDATE hobi SET namagame1='$namagame1', gambargame1='$gambargame1', namagame2='$namagame2', gambargame2='$gambargame2', namagame3='$namagame3', gambargame3='$gambargame3', namagame4='$namagame4', gambargame4='$gambargame4', kereta1='$kereta1', kereta2='$kereta2', kereta3='$kereta3', kereta4='$kereta4' WHERE id='$id'";
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
        $strSQL = "SELECT * FROM hobi WHERE id='$id'";
        $execStrSQL = mysqli_query($conn, $strSQL);
        if(mysqli_num_rows($execStrSQL)){
            while($row = mysqli_fetch_assoc($execStrSQL)){
                $namagame1 = $row['namagame1'];
                $gambargame1 = $row['gambargame1'];
                $namagame2 = $row['namagame2'];
                $gambargame2 = $row['gambargame2'];
                $namagame3 = $row['namagame3'];
                $gambargame3 = $row['gambargame3'];
                $namagame4 = $row['namagame4'];
                $gambargame4 = $row['gambargame4'];
                $kereta1 = $row['kereta1'];
                $kereta2 = $row['kereta2'];
                $kereta3 = $row['kereta3'];
                $kereta4 = $row['kereta4'];
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
                <td>Nama Game 1</td>        
                <td><input type="text" class="form-control" name="namagame1" value="<?= $namagame1 ?>"></td>       
            </tr>
            <tr>
                <td>Gambar Game 1</td>        
                <td><input type="text" class="form-control" name="gambargame1" value="<?= $gambargame1 ?>"></td>       
            </tr>
            <tr>
                <td>Nama Game 2</td>        
                <td><input type="text" class="form-control" name="namagame2" value="<?= $namagame2 ?>"></td>       
            </tr>
            <tr>
                <td>Gambar Game 2</td>        
                <td><input type="text" class="form-control" name="gambargame2" value="<?= $gambargame2 ?>"></td>       
            </tr>
            <tr>
                <td>Nama Game 3</td>        
                <td><input type="text" class="form-control" name="namagame3" value="<?= $namagame3 ?>"></td>       
            </tr>
            <tr>
                <td>Gambar Game 3</td>        
                <td><input type="text" class="form-control" name="gambargame3" value="<?= $gambargame3 ?>"></td>       
            </tr>
            <tr>
                <td>Nama Game 4</td>        
                <td><input type="text" class="form-control" name="namagame4" value="<?= $namagame4 ?>"></td>       
            </tr>
            <tr>
                <td>Gambar Game 4</td>        
                <td><input type="text" class="form-control" name="gambargame4" value="<?= $gambargame4?>"></td>       
            </tr>
            <tr>
                <td>Kereta 1</td>        
                <td><input type="text" class="form-control" name="kereta1" value="<?= $kereta1?>"></td>       
            </tr>
            <tr>
                <td>Kereta 2</td>        
                <td><input type="text" class="form-control" name="kereta2" value="<?= $kereta2?>"></td>       
            </tr>
            <tr>
                <td>Kereta 3</td>        
                <td><input type="text" class="form-control" name="kereta3" value="<?= $kereta3?>"></td>       
            </tr>
            <tr>
                <td>Kereta 4</td>        
                <td><input type="text" class="form-control" name="kereta4" value="<?= $kereta4?>"></td>       
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