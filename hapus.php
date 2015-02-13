<?php
  require 'db.php';
  $id=0;
  
  if ( !empty($_GET['id'])){
      $id = $_REQUEST['id'];
  }
  
  if ( !empty($_POST)) {
  //lacak nilai dari POST
     $id = $_POST ['id'];
     
     //Hapus data 
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "DELETE FROM anggota WHERE id = ?";
     $q   = $pdo->prepare($sql);
     $q->execute(array($id));
     Database::disconnect();
     header("Location:index.php" );
     }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootsrap.min.js"></script>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
        <h3> Hapus Anggota</h3>
      </div>
      
      <form class="form-horizontal" action="hapus.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <p ="alert alert-error"> Kamu yakin akan menghapus??</p>
        <div class="form-action">
          <button type="submit" class="btn btn-danger">Ya</button>
          <a class="btn" href="index.php">No</a>
        </div>
      </form>
    </div>
    
  </body>
 </html>