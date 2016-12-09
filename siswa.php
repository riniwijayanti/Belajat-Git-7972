<?php
	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/age.php');

	$siswa = new Siswa();
	$data = $siswa->readAllSiswa();

	$no = 0;
?>

<table border = "1">
	<tr>
		<td> No </td>
		<td> ID SISWA </td>
		<td> FULL NAME </td>
		<td> DATE OF BIRTH </td>
		<td> images </td>
		<td> Age </td>
		<td> NATIONALITY </td>
		<td colspan="3"> <center> DETAIL </td>
	</tr>
	<?php foreach ($data as $a) : ?>
		
	<tr>
		<td> <?php echo $no++; ?> </td>
		<td> <?php echo $a['id_siswa']; ?></td>
		<td> <?php echo $a['full_name']; ?></td>
		<td> <?php echo $a['date_ob']; ?></td>
		<td> <img src="<?php echo $a['foto']; ?>" ></td>
		<td>
			<?php 
				$age2 = new age($a['date_ob']);
				echo $age2->getUmur();
			?>
		 </td>

		<td> <?php echo $a['nationality']; ?></td>
		<td> <a href = "dsiswa.php?id=<?php echo $a['id_siswa']; ?>"> Detail </a> </td>
		<td> <a href = "usiswa.php?id=<?php echo $a['id_siswa']; ?>"> Edit </a> </td>
		<td> <a href = "delsiswa.php?id=<?php echo $a['id_siswa']; ?>"> Delete </a> </td>
	</tr> 
	<?php endforeach ?>
</table>