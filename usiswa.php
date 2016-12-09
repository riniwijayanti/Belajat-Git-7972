<?php
	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/m_nationality.php');

	$id = $_GET['id'];

	if(!is_numeric($id)){
		exit('Access Forbiden!!');
	}

	$siswa = new Siswa();
	$data = $siswa->readSiswa($id);

	$nation = new nationality();
	$data_nation = $nation->readAllNationality();

	if(empty($data)){
		exit('Siswa is not found');
	}

	$dt = $data[0];
?>

<h2> Edit Siswa </h2>
<form action = "editsiswa.php" method = "POST" enctype = "multipart/form-data">
	<table>
		<tr>
			<td> ID SISWA </td>
			<td> : <input type = "text" name = "in_nis" value =" <?php echo $dt['id_siswa']; ?> " readonly = "true"/> </td>
		</tr>
		<tr>
			<td> FULL NAME </td>
			<td> : <input type = "text" name = "in_name" value =" <?php echo $dt['full_name']; ?>" /> </td>
		</tr>
		<tr>
			<td> EMAIL </td>
			<td> : <input type = "text" name = "in_email" value ="<?php echo $dt['email']; ?>" /> </td>
		</tr>
		<tr>
			<td> NATIONALITY </td>
			<td> :
				<select name="in_nation">
					<option value="">--pilih negara--</option>
					<?php
					foreach ($data_nation as $n) : ?> 
					<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":"" ?>
					<option value="<?php echo $n['id_nationality']?>"  <?php echo $s?>>
					<?php echo $n['nationality'] ?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Foto</td>
			<td> : <input type ="file" name ="in_foto"> </td>
		</tr>

	</table>
	<input type = "submit" value = "Simpan" name = "kirim">
</form>
