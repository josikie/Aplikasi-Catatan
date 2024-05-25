<?php
	require_once('koneksi.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Aplikasi Catatan</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				 <div class="col-lg-12">
				 <br/>
				 <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
				 <table class="table table-hover table-bordered" style="margin-top: 10px">
					<tr class="success">
						<th width="50px">No</th>
						<th>Catatan</th>
						<th style="text-align: center;">Actions</th>
					</tr>
					 <?php
						$sql = "SELECT * FROM notes_app";
						$row = $koneksi->prepare($sql);
						$row->execute();
						$notes = $row->fetchAll();
						$i =1;
						foreach($notes as $note){
					 ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $note['note']?></td>
						<td style="text-align: center;">
							<a href="ubah.php?id=<?php echo $note['id'];?>" class="btn btn-success btn-md">
							<span class="fa fa-edit"></span></a>
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="hapus.php?id=<?php echo $note['id'];?>" 
							class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
						</td>
					</tr>
					<?php
						$i++;
						}
					?>
				 </table>
			  </div>
			</div>
		</div>
	</body>
</html>