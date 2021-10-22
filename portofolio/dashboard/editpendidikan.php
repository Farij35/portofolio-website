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
            <a href="dashpendidikan.php" class="btn btn-info" role="button">Kembali</a>
            </span>
        </div> 
    </div>  
<?php
include "koneksi.php";
include "fungsi.php";
$id = $sd = $tahunsd = $smp = $tahunsmp = $smk = $jurusansmk = $tahunsmk = $kuliah = $jurusankuliah = $tahunkuliah = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = bersihkan_input($_POST['id']);
    $sd = bersihkan_input($_POST['sd']);
    $tahunsd = bersihkan_input($_POST['tahunsd']);
    $smp = bersihkan_input($_POST['smp']);
    $tahunsmp = bersihkan_input($_POST['tahunsmp']);
    $smk = bersihkan_input($_POST['smk']);
    $jurusansmk = bersihkan_input($_POST['jurusansmk']);
    $tahunsmk = bersihkan_input($_POST['tahunsmk']);
    $kuliah = bersihkan_input($_POST['kuliah']);
    $jurusankuliah = bersihkan_input($_POST['jurusankuliah']);
    $tahunkuliah = bersihkan_input($_POST['tahunkuliah']);

    $strSQL = "UPDATE pendidikan SET sd='$sd', tahunsd='$tahunsd', smp='$smp', tahunsmp='$tahunsmp', smk='$smk', jurusansmk='$jurusansmk', tahunsmk='$tahunsmk', kuliah='$kuliah', jurusankuliah='$jurusankuliah', tahunkuliah='$tahunkuliah' WHERE id='$id'";
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
        $strSQL = "SELECT * FROM pendidikan WHERE id='$id'";
        $execStrSQL = mysqli_query($conn, $strSQL);
        if(mysqli_num_rows($execStrSQL)){
            while($row = mysqli_fetch_assoc($execStrSQL)){
                $sd = $row['sd'];
                $tahunsd = $row['tahunsd'];
                $smp = $row['smp'];
                $tahunsmp = $row['tahunsmp'];
                $smk = $row['smk'];
                $jurusansmk = $row['jurusansmk'];
                $tahunsmk = $row['tahunsmk'];
                $kuliah = $row['kuliah'];
                $jurusankuliah = $row['jurusankuliah'];
                $tahunkuliah = $row['tahunkuliah'];
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
                <td>SD</td>        
                <td><input type="text" class="form-control" name="sd" value="<?= $sd ?>"></td>       
            </tr>
            <tr>
                <td>Tahun SD</td>        
                <td><input type="text" class="form-control" name="tahunsd" value="<?= $tahunsd ?>"></td>       
            </tr>
            <tr>
                <td>SMP</td>        
                <td><input type="text" class="form-control" name="smp" value="<?= $smp ?>"></td>       
            </tr>
            <tr>
                <td>Tahun SMP</td>        
                <td><input type="text" class="form-control" name="tahunsmp" value="<?= $tahunsmp ?>"></td>       
            </tr>
            <tr>
                <td>SMK</td>        
                <td><input type="text" class="form-control" name="smk" value="<?= $smk ?>"></td>       
            </tr>
            <tr>
                <td>Jurusan SMK</td>        
                <td><input type="text" class="form-control" name="jurusansmk" value="<?= $jurusansmk ?>"></td>       
            </tr>
            <tr>
                <td>Tahun SMK</td>        
                <td><input type="text" class="form-control" name="tahunsmk" value="<?= $tahunsmk?>"></td>       
            </tr>
            <tr>
                <td>Kuliah</td>        
                <td><input type="text" class="form-control" name="kuliah" value="<?= $kuliah?>"></td>       
            </tr>
            <tr>
                <td>Jurusan Kuliah</td>        
                <td><input type="text" class="form-control" name="jurusankuliah" value="<?= $jurusankuliah?>"></td>       
            </tr>
            <tr>
                <td>Tahun Kuliah</td>        
                <td><input type="text" class="form-control" name="tahunkuliah" value="<?= $tahunkuliah?>"></td>       
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