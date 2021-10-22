<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
<body>

<?php include_once "menu.php"; ?>

<div class="container">
  <h2>Dashboard Pendidikan</h2>          
  <table id="coba" class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Sekolah Dasar</th>
        <th>Tahun SD</th>
        <th>Sekolah Menengah Pertama</th>
        <th>Tahun SMP</th>
        <th>Sekolah Menengah Kejuruan</th>
        <th>Jurusan SMK</th>
        <th>Tahun SMK</th>
        <th>Universitas</th>
        <th>Jurusan Universitas</th>
        <th>Tahun Kuliah</th>
      </tr>
    </thead>
    <tbody>
<?php
$strSQL = "SELECT * FROM pendidikan";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
      <tr>
        <td><?= $row["id"] ?></a></td>
        <td><?= $row["sd"] ?></td>
        <td><?= $row["tahunsd"] ?></td>
        <td><?= $row["smp"] ?></td>
        <td><?= $row["tahunsmp"] ?></td>
        <td><?= $row["smk"] ?></td>
        <td><?= $row["jurusansmk"] ?></td>
        <td><?= $row["tahunsmk"] ?></td>
        <td><?= $row["kuliah"] ?></td>
        <td><?= $row["jurusankuliah"] ?></td>
        <td><?= $row["tahunkuliah"] ?></td>
        <td>
          <a href="editpendidikan.php?id=<?=$row["id"] ?>" class="btn btn-primary">Edit</a>
        </td>
      </tr>
<?php
    }
  }
?>
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#coba').DataTable();
    } );
  </script>
</body>
</html>