<?php
require_once('koneksi.php');

	if(!empty($_POST['note'])){
		$note = $_POST['note'];
		
		$data[] = $note;
		
		$sql = 'INSERT INTO notes_app (note) VALUES (?)';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Tambah Data");window.location="index.php"</script>';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Catatan</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Tambah Catatan</h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>Catatan</label>
                             <textarea class="form-control" name="note" placeholder="Catat disini..."></textarea>
						 </div>

						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Create</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>