<?php
	require "../../php/connection.php";

	$lowongan_id 	  = $_POST['lowongan_id'];
	$calon_pekerja_id = $_POST['calon_pekerja_id'];
	$tanggal_lamaran  = $_POST['tanggal_lamaran'];
	$status 	      = $_POST['status'];
	
	$cekdata = mysqli_query($connection, "SELECT * FROM calon_pekerja WHERE calon_pekerja_id='$calon_pekerja_id'");
	while($result = mysqli_fetch_assoc($cekdata)){
	if (empty($result['calon_pekerja_alamat']) OR empty($result['kota_id']) OR empty($result['calon_pekerja_jenis_kelamin']) OR empty($result['calon_pekerja_tempat_lahir'])
	OR empty($result['calon_pekerja_tanggal_lahir']) OR empty($result['calon_pekerja_status_pernikahan']) OR empty($result['calon_pekerja_telepon']) 
	OR empty($result['calon_pekerja_pendidikan_terakhir']) OR empty($result['calon_pekerja_tempat_pendidikan_terakhir']) OR empty($result['calon_pekerja_file_cv'])){
	echo "<script>window.alert('Harap Lengkapi Profil Sebelum Melamar Pekerjaan !!')
	window.location='../profil_edit.php';</script>";
	}else{

	$strQuery = "INSERT INTO lamaran VALUES(null,'$lowongan_id', '$calon_pekerja_id','$tanggal_lamaran', '$status')";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		echo "<script language=javascript>alert('Lowongan Berhasil Di-apply.');</script>";
	}else{
		echo "<script language=javascript>alert('Lowongan Sudah Di-apply.');</script>";
			}
		}
	}
	echo "<script language=javascript>document.location.href='../dashboard.php'</script>";
	mysqli_close($connection);
?>