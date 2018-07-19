<?php 
	require '../class/sonuoc.php';
	$list = getlist();
	disconnect_db();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Danh sách</title>
 </head>
 <body>
 	<table>
 		<tr>
 			<td>Số phòng</td>
 			<td>Số nước</td>
 			<td>Lầu</td>
 			<td>Tháng</td>
 		</tr>

 		<?php foreach ($list as $item) {?>
 		<tr>
 			<td><?php echo $item['sophong']?></td>
 			<td><?php echo $item['chiso']?></td>
 			<td><?php echo $item['lau']?></td>
 			<td><?php echo $item['thang']?></td>
 		</tr>

 		<?php } ?>
 	</table>
 </body>
 </html>