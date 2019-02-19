<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KDU - Kencana Daya Utama</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include "menu.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>Informasi Terbaru</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Informasi Terbaru</li>
                </ol>
            </div>
        </div>
        <?php
        /** if(isset($_POST['input'])){
		$kode     = $_POST['id'];
        $nama     = $_POST['nama'];
		$alamat   = $_POST['alamat'];
		$no_telp  = $_POST['no_telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM member WHERE id_member='$kode'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO member(id_member, nama_member, alamat, no_telp, username, password)
															VALUES('$kode','$nama', '$alamat', '$no_telp', '$username', '$password')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan silahkan login ke halaman member.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Member Sudah Ada..!</div>';
				}
			}**/
            ?>
             <?php $query1="select * from artikel";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                    <?php 
                     
                     while($data=mysqli_fetch_array($tampil))
                    {  ?>
                      <div class="row">
            <div class="col-lg-12">
            <div class="col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-wrench"></i> <?php echo $data['judul']; ?> / <?php echo $data['tanggal']; ?> / <?php echo $data['kategori']; ?> </h4>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $data['isi']; ?></p>
                        <a href="#" class="btn btn-warning">Detail</a>
                    </div>
                </div>
            </div>
            </div>
            </div>
                  
<?php } ?>
        <hr>

        <!-- Footer -->
        <?php include "footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#form1").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>

</body>

</html>
