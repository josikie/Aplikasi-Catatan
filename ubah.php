<?php
require_once('koneksi.php');
	
	if(!empty($_POST['note'])){
		$note = $_POST['note'];
        $id = $_POST['id'];
		
		$data[] = $note;
        $data[] = $id;
		
		$sql = 'UPDATE notes_app SET note=? WHERE id=?';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Edit Data");window.location="index.php"</script>';
	}
	$id = $_GET['id'];
	$sql = "SELECT *FROM notes_app WHERE id= ?";
	$row = $koneksi->prepare($sql);
	$row->execute(array($id));
	$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Catatan></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Edit Catatan</h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
                        <div class="form-group">
							 <label>Catatan</label>
                             <textarea class="form-control" name="note"><?php echo $hasil['note'];?></textarea>
						 </div>

						 <input type="hidden" value="<?php echo $hasil['id'];?>" name="id">
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i>Update</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>