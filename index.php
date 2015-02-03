<!DOC TYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h3>Kontak CRUD pake PHP</h3>
			</div>
				<div class="row">
					<p>
						<a href="buat.php" class="btn button-success">Create</a>
					</p>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Email</th>
									<th>No.HP</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'db.php';
								$pdo = database::connect();
								$sql = 'SELECT * FROM anggota ORDER BY id DESC';
								foreach ($pdo->query($sql) as $row) {
									echo '<tr>';
									echo '<td>'.$row ['name'].'</td>';
									echo '<td>'.$row ['email'].'</td>';
									echo '<td>'.$row ['mobile'].'</td>';
									echo '<td widht=250>';
									echo '<a class="btn" href="baca.php?id='.$row['id'].'">Baca</a>'; 
									echo ' ';
									echo '<a class="btn button-success" href="edit.php?id='.$row['id'].'">Edit</a>'; 
									echo ' ';
									echo '<a class="btn button-danger" href="hapus.php?id='.$row['id'].'">Hapus</a>';
									echo '</td>';
									echo '</tr>';
								}
								database::disconnect();
								?>
							</tbody>
					</table>
				</div>				
		</div><!-- END container-->
	</body>
</html>