<?php
	//update dari github
	//by riniwijayanti

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	if(!isset($_POST['kirim'])){
		exit('Access Forbiden');
	}

	$siswa= new siswa();

	if(!copy($_FILES['in_foto']['tmp_name'],'img/'.$_POST['in_nis'].'.png')){
		exit('Error upload file');
	}


	$data['input_name']= $_POST['in_name'];
	$data['input_email']=$_POST['in_email'];
	$data['input_nationality']=$_POST['in_nation'];
	$data['foto']="img/".$_POST['in_nis'].".png";

	 $siswa->updateSiswa($_POST['in_nis'], $data);
	 echo "Data siswa telah diupdate <br/>";
	 echo "<a href = 'siswa.php?id=".$_POST['in_nis']."'> Detail Siswa </a> ";
	
?>
