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
  <h2>Dashboard Home</h2>         
  <table id="coba" class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Kalimat 1</th>
        <th>Kalimat 2</th>
        <th>Gambar</th>
      </tr>
    </thead>
    <tbody>
<?php
$strSQL = "SELECT * FROM jumbotron";
$execStrSQL = mysqli_query($conn,$strSQL);

if(mysqli_num_rows($execStrSQL) > 0){
  while($row = mysqli_fetch_assoc($execStrSQL)){
?>
      <tr>
        <td><?= $row["id"] ?></a></td>
        <td><?= $row["kalimat1"] ?></td>
        <td><?= $row["kalimat2"] ?></td>
        <td><img style = "width : 50px" src="<?= $row["gambar"] ?>"></td>
        <td>
          <a href="edit.php?id=<?=$row["id"] ?>" class="btn btn-primary">Edit</a>
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
