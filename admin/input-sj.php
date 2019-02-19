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
                       Surat Jalan
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Surat Jalan</a></li>
                        <li class="active">Input Surat Jalan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<?php
        if(isset($_GET['hal']) == 'hapus'){
				$kd_produk = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM temporary WHERE id_produk='$kd_produk'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM temporary WHERE id_produk='$kd_produk'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}

		if(isset($_POST['input'])){
				$no_surat  = $_POST['no_surat'];
				$tanggal   = $_POST['tanggal'];
				$no_po     = $_POST['no_po'];
				$id_member = $_POST['id_member'];
                $attention = $_POST['attention'];
                $id_produk = $_POST['id_produk'];
                $qty   	   = $_POST['qty'];
                $unit      = $_POST['unit'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM temporary WHERE id_produk='$id_produk'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO temporary(no_surat, tanggal, no_po, id_member, attention, id_produk, qty, unit)
															VALUES('$no_surat','$tanggal','$no_po','$id_member','$attention','$id_produk','$qty','$unit')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat Jalan Sudah Ada..!</div>';
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
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input Surat Jalan </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input-sj.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No Surat</label>
                              <div class="col-sm-3">
                                  <input name="no_surat" type="text" id="no_surat" class="form-control" autocomplete="off" placeholder="No Surat Jalan" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                              <div class="col-sm-3">
                            <input name="tanggal" type="text" id="tanggal" class="form-control" autocomplete="off" placeholder="Tanggal" value="<?php echo date("Y-m-d") ?>" autocomplete="off" readonly="readonly" />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No PO</label>
                              <div class="col-sm-3">
                              <select name="no_po" id="no_po" class="form-control" required>
                              <option value=""> -- Pilih PO Number -- </option>
                              <?php
                    $query1="select * from po order by id_order ASC";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['no_po'];?>"><?php echo $data['no_po'];?></option>
                            
						    <?php  
                             } ?>
                              
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Member</label>
                              <div class="col-sm-3">
                              <select name="id_member" id="id_member" class="form-control" required>
                              <option value=""> -- Pilih Member -- </option>
                              <?php
                    $query2="select * from member order by id_member ASC";
                    $tampil2=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil2))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['nama_member'];?>"><?php echo $data['nama_member'];?></option>
                            
						    <?php  
                             } ?>
                              
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Attention</label>
                              <div class="col-sm-3">
                            <input name="attention" type="text" id="attention" class="form-control" autocomplete="off" placeholder="Attention" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Produk</label>
                              <div class="col-sm-3">
                              <select name="id_produk" id="id_produk" class="form-control" required>
                              <option value=""> -- Pilih Produk -- </option>
                              <?php
                    $query3="select * from produk order by id_produk ASC";
                    $tampil3=mysqli_query($koneksi, $query3) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil3))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['nama_produk'];?>"><?php echo $data['nama_produk'];?></option>
                            
						    <?php  
                             } ?>
                              
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Qty</label>
                              <div class="col-sm-1">
                            <input name="qty" type="text" id="qty" width="30" class="form-control" autocomplete="off" placeholder="qty" autocomplete="off" required />
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                              <div class="col-sm-3">
                              <select name="unit" id="unit" class="form-control" required>
                              <option value="">Pilih Unit</option>
                              <option value="Ea">Ea</option>
                              <option value="Pcs">Pcs</option>
                              <option value="Kg">Kg</option>
                              <option value="Ons">Ons</option>
                              <option value="Package">Package</option>
                              <option value="Bundle">Bundle</option>
                              <option value="Roll">Roll</option>
                              <option value="Bottle">Bottle</option>
                              <option value="Tube">Tube</option>
                              </select>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="sj.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
          		</div><!-- col-lg-12-->
                   
                    </div><!-- /.row (main row) -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> List data </h3> 
                        </div>
                        <div class="panel-body">
                        <form id="formku" name="formku" method="post">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from temporary";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>No Surat</i></center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>No PO </center></th>
                        <th><center>Member </center></th>
                        <th><center>Pic</center></th>
                        <th><center>Produk</center></th>
                        <th><center>Qty</center></th>
                        <th><center>Unit</center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['no_surat'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['no_po'];?></center></td>
                    <td><center><?php echo $data['id_member'];?></center></td>
                    <td><center><?php echo $data['attention'];?></center></td>
                    <td><center><?php echo $data['id_produk'];?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td><center><?php echo $data['unit'];?></center></td>
                    <td><center><div id="thanks"> 
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['id_produk'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Produk" href="input-sj.php?hal=hapus&kd=<?php echo $data['id_produk'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
                    </tr>
                     <?php   
                 $a=$data['no_surat'];
                 $b=$data['tanggal'];
                 $c=$data['no_po'];
                 $d=$data['id_member'];
                 $e=$data['attention'];
                 $f=$data['id_produk'];
                 $g=$data['qty'];
                 $h=$data['unit'];
                 
                if(isset($_POST['simpansj'])){
				$no_surat  = $a;
				$tanggal   = $b;
				$no_po     = $c;
				$id_member = $d;
				$attention = $e;
                $id_produk = $f;
                $qty       = $g;
                $unit      = $h;
                
				//$cek = mysqli_query($koneksi, "SELECT * FROM t_po WHERE f_pono='$pono'");
				//if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO surat_jalan(no_surat, tanggal, no_po, id_member, attention)
						                                  VALUES('$no_surat', '$tanggal', '$no_po', '$id_member', '$attention');") or die(mysqli_error());
						if($insert){
						            //$cek2 = mysqli_query($koneksi, "SELECT * FROM t_po_detail WHERE f_pono='$pono'");
                                    //if(mysqli_num_rows($cek2) == 0){
                                    $input = mysqli_query($koneksi, "INSERT INTO detail_surat(no_surat, id_produk, qty, unit)
															VALUES('$no_surat','$id_produk', '$qty', '$unit')") or die(mysqli_error());
                                                            
                                    $delete = mysqli_query($koneksi, "DELETE FROM temporary");
					                      //}
                                          //session_unset();
                                          //session_destroy();
                              echo "<script>alert('Surat Jalan Berhasil dimasukan!'); window.location = 'sj.php'</script>";      
                                    //}
                        }else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				//}else{
				//	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No PO Sudah Ada..!</div>';
				//}
                
			} ?>
                 <?php   
              } 
              ?></div>
                   </tbody>
                   </table>
                   
                   <div class="col-md-0">
					<button id="simpansj" name="simpansj" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Save Surat Jalan </button> 
				</div>
                
                </form>
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
        
    </body>
</html>
