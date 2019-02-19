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
                <h1 class="page-header">Register
                    <small>Member Baru</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Register Member Baru</li>
                </ol>
            </div>
        </div>
        <?php
        include "conn.php";
        
        if(isset($_POST['input'])){
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
			}
            ?>
            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Silahkan Mendaftar terlebih dahulu, kemudian login ke halaman member untuk order jasa kami.</div>
        
                      <form class="form-horizontal style-form" action="register.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <!-- <label class="col-sm-2 col-sm-2 control-label">Id Member</label>-->
                              <div class="col-sm-3">
                                  <input name="id" type="hidden" id="id" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-3">
                            <input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-3">
                            <input name="alamat" type="text" id="alamat" class="form-control required" autocomplete="off" placeholder="Alamat" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Telepon</label>
                              <div class="col-sm-3">
                            <input name="no_telp" type="text" id="no_telp" maxlength="15" class="form-control required number" maxlength="14" autocomplete="off" placeholder="No Telepon" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-3">
                            <input name="username" type="text" id="username" class="form-control required" minlength="6" autocomplete="off" placeholder="Username" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-3">
                            <input name="password" type="password" id="password" class="form-control required" minlength="6" autocomplete="off" placeholder="Password" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <input type="reset" class="btn btn-sm btn-danger" value="Refresh"/>
                              </div>
                          </div>
                      </form>
                  

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
