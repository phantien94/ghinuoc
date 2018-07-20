<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="add.css" />
	<script language="javascript" src="add.js"></script>
</head>
<body>
	<div id="form">

	<div class="fish" id="fish"></div>
	<div class="fish" id="fish2"></div>

	<a href="add.php">ADD</a>
	
	<h2 align="center">Tìm thông tin số nước của phòng bạn</h2>	
	<form action="home.php" method='GET'>
		<input type="text" name="sophong" placeholder="Nhập số phòng.." />
		<input type="submit" value="Search" name="ok">
	</form>
	<hr>
	<?php 
		require '../class/sonuoc.php';

		if(isset($_REQUEST['ok'])){
			$sophong = addslashes($_GET['sophong']);

			if(empty($sophong)){
				echo "Bạn chưa nhập số phòng";
			}
			else{
				global $conn;
				connect_db();		
				$sql = "select * from sonuoc where sophong='$sophong' order by thang DESC";
				$result = mysqli_query($conn,$sql);

				if (mysqli_num_rows($result) > 0){
				 	echo '<table border="1" cellspacing="0" cellpadding="10">';
				 		echo "<tr>";
				 				echo "<td>Số phòng</td>";
				 				echo "<td>Tháng</td>";
				 				echo "<td>Số nước</td>";
				 		echo "</tr>";
				        while($row = mysqli_fetch_assoc($result)){
				        	echo "<tr>";
				        	 	echo "<td>{$row['sophong']}</td>";				        	
				        	 	echo "<td>{$row['thang']}</td>";
				        		echo "<td>{$row['chiso']}</td>";
				        	echo "</tr>";
				        }
			      	echo '</table>';   
		    	}
		    	else{
		    		echo "Không tìm thấy kết quả";
		    	}

			}

		}

	?>
</body>
</html>