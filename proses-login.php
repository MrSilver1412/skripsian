<link rel="stylesheet" href="css/sweetalert.css">
<?php
	require "php/connection.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$encPassword = md5($password);
	
	$hasil = mysqli_query($connection,"SELECT * FROM login WHERE login_username='$username' AND login_password='$encPassword'");
						if(mysqli_num_rows($hasil) > 0){
							session_start();
							$data = mysqli_fetch_array($hasil);
							$_SESSION['login_username'] = $data['login_username'];
							$_SESSION['login_role']     = $data['login_role'];
							$login_id					= $data['login_id'];
							$login_role 				= $data['login_role'];
							
							//Status Lokasi . . .
							if($data['login_role'] == 'Admin'){
								$AQuery  = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$login_id'");
								$resultA = mysqli_fetch_array($AQuery);
								$_SESSION['login_role'] = $login_role;
								$_SESSION['admin_id']   = $resultA['admin_id'];
								$_SESSION['admin_nama'] = $resultA['admin_nama'];
									echo "<script type='text/javascript'>
												setTimeout(function () { 
										
											swal({
												title: 'Admin',
												text:  'Hallo $resultA[admin_nama]',
												type: 'success',
												timer: 3000,
												showConfirmButton: true
												});		
												},10);	
											window.setTimeout(function(){ 
											window.location.replace('admin/dashboard.php');
											} ,3000);	
											</script>";
							} else if($data['login_role'] == 'Perusahaan'){
								$PQuery  = "SELECT * FROM perusahaan WHERE perusahaan_id = '$login_id'";
								$queryP   = mysqli_query($connection, $PQuery);
								$resultP = mysqli_fetch_array($queryP, MYSQLI_ASSOC);
								$_SESSION['login_role']      = $login_role;
								$_SESSION['perusahaan_id']   = $resultP['perusahaan_id'];
								$_SESSION['perusahaan_nama'] = $resultP['perusahaan_nama'];
									echo "<script type='text/javascript'>
												setTimeout(function () { 
										
											swal({
												title: 'Perusahaan',
												text:  'Hallo $resultP[perusahaan_nama]',
												type: 'success',
												timer: 3000,
												showConfirmButton: true
												});		
												},10);	
											window.setTimeout(function(){ 
											window.location.replace('perusahaan/lowongan.php');
											} ,3000);	
											</script>";
							} else if($data['login_role'] == 'Calon Pekerja'){
								$CQuery  = "SELECT * FROM calon_pekerja WHERE calon_pekerja_id = '$login_id'";
								$query   = mysqli_query($connection, $CQuery);
								$resultC = mysqli_fetch_array($query, MYSQLI_ASSOC);
								$_SESSION['login_role'] 	  		    = $login_role;
								$_SESSION['calon_pekerja_id'] 			= $resultC['calon_pekerja_id'];
								$_SESSION['calon_pekerja_nama_lengkap'] = $resultC['calon_pekerja_nama_lengkap'];
								echo "<script type='text/javascript'>
											setTimeout(function () { 
									
										swal({
											title: 'Pelamar',
											text:  'Hallo $resultC[calon_pekerja_nama_lengkap]',
											type: 'success',
											timer: 3000,
											showConfirmButton: true
											});		
											},10);	
										window.setTimeout(function(){ 
										window.location.replace('calonpekerja/dashboard.php');
										} ,3000);	
										</script>";
						}
					}
					if($data['login_username'] != $username){
						echo "<script>alert('Username Atau Password Yang Anda Masukan Salah !');window.history.go(-1);</script>";
						}

	mysqli_close($connection);
?>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/qunit-1.18.0.js"></script>