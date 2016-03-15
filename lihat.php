<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body style="text-align:center">
<a href="index.php"> Tambah </a> |
<a href="lihat.php">Lihat</a>
<br />
<br />
<br />
<?php
include "koneksi.php";
if (isset($_GET["action"])) {
	if ($_GET["action"] == "hapus"){
	if(isset($_GET["id_user"])) {
		$id_user=$_GET["id_user"];
		$hapus = "DELETE FROM user WHERE id_user = $id_user";
		$bd-> query($hapus);
		echo "<font color='red'> Data berhasil dihapus</font>";
		$bd->close();
	}
	}
}
?>
<table border="1" align="center">
<thead>
<tr>
<td>ID </td>
<td>Nama </td>
</tr>
</thead>
<tbody>


<?php
include "koneksi.php";
$tampil ="SELECT * FROM user";
$result = $bd->query($tampil);
if ($result->num_rows > 0){
	while ($row =$result->fetch_assoc()){
		?>
		<tr>
        <td>
        <?php echo $row["id_user"] ?>
		</td>
        <td>
        <?php echo $row["nama_user"] ?>
		</td>
        <td>
        <a href="index.php?action=edit&id_user=<?php echo $row["id_user"] ?>"> Edit</a> |
        <a href="lihat.php?action=delete&id_user=<?php echo $row["id_user"] ?>"> Delete</a> |
        
        </tr>
        <?php
	}
}else {
	echo "Tidak ada data";
}
$bd->close();
?>

</table>
</body>
</html>