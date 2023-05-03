<?php
	require "php/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?php echo $title ?></title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/themify-icons.css" rel="stylesheet">
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top" color-on-scroll="200">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand" style="color: #000000;"><?php echo $title ?></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                        <li class="dropdown">
                        <a data-placement="bottom" title="Login User" onclick="$('#modal-user-login').modal('show');"><i class="fa fa-sign-in" style="font-size: 17px;"> <small>SIGN IN</small></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="calonpekerja/signup.php" style="color: #000000; background-color: #00B16A; border-radius: 15px;">
                                <i class="fa fa-user-plus" style="font-size: 17px;"> <small>SIGN UP</small></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="section section-header">
            <div class="parallax filter filter-color-blue">
                <div class="image" style="background-image: url('img/10.jpg')">
                </div>
                <div class="container">
                    <div class="content">
                        <form method="GET" action="lowongan_list.php">
                            <div class="title-area">
                                <p>Cari Lowongan Pekerjaan yang Kamu Inginkan</p><br/>
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-lg" name="nama" placeholder="Lowongan Pekerjaan"/>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control input-lg" name="kota_id" style="height: 55px; font-size: 16px;" required>
                                        <?php
                                            $strQuery = "SELECT kota_id, kota_nama FROM kota";
                                            $query    = mysqli_query($connection, $strQuery);
                                                echo "<option value=>Pilih Cabang</option>";
                                            while($result = mysqli_fetch_assoc($query)){
                                                echo "<option value=$result[kota_id]>$result[kota_nama]</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="Submit" class="btn btn-primary btn-fill btn-lg" style="height: 55px;">
                                <i class="fa fa-search" style="font-size: 15px;"> <small>Cari Lowongan</small></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    </html>

        		<div class="modal fade" id="modal-user-login" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header text-center">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
								<h3 class="modal-title"></i>SIGN IN</h3>
							</div>
							<!-- END Modal Header -->

							<!-- Modal Body -->
							<div class="modal-body">
								<form method="post" class="form-horizontal form-bordered" action="proses-login.php">
									<div class="form-group">
										<label class="col-md-4 control-label" for="example-hf-email">Username</label>
										<div class="col-md-6">
										<input type="text" name="username" value="" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="example-hf-email">Password</label>
										<div class="col-md-6">
											<input type="password" name="password" value="" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-9 col-md-offset-5">
											<button type="submit" name="login" class="btn btn-sm btn-info">LOGIN</button>
										</div>
									</div>
								</form>
							</div>
							<!-- END Modal Body -->
						</div>
					</div>
