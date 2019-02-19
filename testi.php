<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UD. Kencana Daya Utama">
    <meta name="author" content="UD. Kencana Daya Utama">

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

        <!-- Team Members -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Testimoni</h2>
            </div>
            <?php $query1="select member.nama_member, member.gambar, testimoni.komentar, testimoni.rating from member, testimoni where member.id_member=testimoni.id_member";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                    <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
            <div class="col-md-4 text-center">
                <div class="thumbnail">
                    <h2><img src="admin/<?php echo $data['gambar']; ?>" class="img-circle" /></h2>
                    <div class="caption">
                        <h3><?php echo $data['nama_member']; ?><br>
                            <!--<small></small>-->
                        </h3>
                        <p><?php echo $data['komentar'] ?></p>
                        <ul class="list-inline"> Rating :
                           <?php
                            if($data['rating'] == '1'){
								echo '<span class="glyphicon glyphicon-star"></span>';
							}
                            else if ($data['rating'] == '2' ){
								echo '<span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>';
							}
                            else if ($data['rating'] == '3' ){
								echo '<span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>';
							}
                            else if ($data['rating'] == '4' ){
								echo '<span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>';
							}
                            else if ($data['rating'] == '5' ){
								echo '<span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span> <span class="glyphicon glyphicon-star"></span>';
							}
                    
                    ?>
                        </ul>
                    </div>
                </div>
            </div>
             <?php   
              } 
              ?>
        </div>
        <!-- /.row -->

        <!-- Our Customers -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Customer Kami</h2>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/a.jpg" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/b.jpg" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/c.jpg" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/d.jpg" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/e.jpg" alt="">
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <img class="img-circle img-responsive customer-img" style="border: 3px solid grey;" src="image/a.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "footer.php"; ?>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
