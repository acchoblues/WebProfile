<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrator
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    
                                    </p>
                                </li>
                                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                                <!-- Menu Body -->
                                <?php include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Purchase Order
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> PO</a></li>
                        <li class="active">Input PO</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<?php
		if(isset($_POST['input'])){
				$id_order	 = $_POST['id_order'];
				$no_po	     = $_POST['no_po'];
				$id_jenis    = $_POST['id_jenis'];
				$id_member 	 = $_POST['id_member'];
                $lokasi 	 = $_POST['lokasi'];
                $rincian 	 = $_POST['rincian'];
                $unit 	     = $_POST['unit'];
                $qty 	     = $_POST['qty'];
                $harga 	     = $_POST['harga'];
                $tgl_order 	 = $_POST['tgl_order'];
                $tgl_selesai = $_POST['tgl_selesai'];
                $status 	 = $_POST['status'];
                $a           = 'Silahkan Di Isi';
				
				$cek = mysqli_query($koneksi, "SELECT * FROM po WHERE no_po='$no_po'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO po(id_order, no_po, id_jenis, id_member, lokasi, rincian, unit, qty, harga, tgl_order, tgl_selesai, status)
															VALUES('$id_order','$no_po','$id_jenis','$id_member','$lokasi','$rincian','$unit','$qty','$harga','$tgl_order','$tgl_selesai','$status')") or die(mysqli_error());
						if($insert){
						            $input = mysqli_query($koneksi, "INSERT INTO jadwal_proyek(id_jadwal, id_jenis, id_member, id_teknisi, no_po, tgl_proyek, tgl_selesai, report, status)
															VALUES(0,'$id_jenis','$id_member',0,'$no_po','$tgl_order','$tgl_selesai','$a','$a')") or die(mysqli_error());
                                    
                                    /** $input2 = mysqli_query($koneksi, "INSERT INTO jadwal_survei(no_po, jenis, tanggal_order, tanggal_survei, id_member, id_jenis)
															VALUES('$no_po',0,$tgl_order','$tgl_selesai','$id_member','$id_jenis')") or die(mysqli_error());                        
                                    //$delete = mysqli_query($koneksi, "DELETE FROM t_po_transit");**/
                                    
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data PO Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data PO Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIP Sudah Ada..!</div>';
				}
			}

			?>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input PO </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input-po.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id Order</label>
                              <div class="col-sm-3">
                                  <input name="id_order" type="text" id="id_order" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No PO</label>
                              <div class="col-sm-3">
                                  <input name="no_po" type="text" id="no_po" class="form-control" autocomplete="off" placeholder="No Purchase Order" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis Pekerjaan</label>
                              <div class="col-sm-3">
                              <select name="id_jenis" id="id_jenis" class="form-control" required>
                              <option value=""> -- Pilih Jenis Pekerjaan -- </option>
                              <?php
                    $query1="select * from jenis order by id_jenis ASC";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['id_jenis'];?>"><?php echo $data['pekerjaan'];?></option>
                            
						    <?php  
                             } ?>
                              
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Member</label>
                              <div class="col-sm-3">
                              <select name="id_member" id="id_member" class="form-control" required>
                              <option value=""> -- Pilih Nama Member -- </option>
                              <?php
                    $query1="select * from member order by id_member ASC";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['id_member'];?>"><?php echo $data['nama_member'];?></option>
                            
						    <?php
                             } ?>
                              
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                              <div class="col-sm-3">
                                  <input name="lokasi" type="text" id="lokasi" class="form-control" autocomplete="off" placeholder="Lokasi" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rincian</label>
                              <div class="col-sm-3">
                              <textarea cols="60" rows="5" name="rincian" id="rincian">
                              </textarea>
                            </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                              <div class="col-sm-3">
                                  <input name="unit" type="text" id="unit" class="form-control" autocomplete="off" placeholder="Unit" required="required"/>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Qty</label>
                              <div class="col-sm-3">
                                  <input name="qty" type="text" id="qty" class="form-control" autocomplete="off" placeholder="Qty" required="required"/>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-3">
                                  <input name="harga" type="text" id="harga" class="form-control" autocomplete="off" placeholder="Harga" required="required"/>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Order</label>
                              <div class="col-sm-3">
                                  <input name="tgl_order" type="text" id="tgl_order" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Tanggal Order" required="required"/>
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
                              <div class="col-sm-3">
                                  <input name="tgl_selesai" type="text" id="tgl_selesai" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Tanggal Selesai" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status</label>
                              <div class="col-sm-3">
                                  <input name="status" type="text" id="status" class="form-control" autocomplete="off" placeholder="Status" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="po.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
          		</div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="../dist/jquery.js"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.core.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	
    </script>
        
    </body>
</html>
