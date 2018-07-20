<?php 
	require '../class/sonuoc.php';
	$date = getdate();

	if(!empty($_POST['add'])){

		$data['chiso'] = isset($_POST['chiso']) ? $_POST['chiso'] : '';

		$data['sophong'] = isset($_POST['sophong']) ? $_POST['sophong'] : '';

		$data['lau'] = isset($_POST['lau']) ? $_POST['lau'] : '';

		$data['thang'] = isset($_POST['thang']) ? $_POST['thang'] : '';

		$errors = array();

		if(empty($data['chiso'])) {
			$errors['chiso'] = 'Bạn chưa nhập số nước';
		}
		else if(!sonuocValidate($data['chiso'])){
			$errors['chiso'] = 'Chỉ cho phép nhập số';
		}

		if(empty($data['sophong'])) {
			$errors['sophong'] = 'Bạn chưa nhập số phòng';
		}
		else if(!sophongValidate($data['sophong'])){
			$errors['sophong'] = 'Chỉ cho phép nhập số và chữ';
		}

		if(empty($data['lau'])) {
			$errors['lau'] = 'Bạn chưa chọn lầu';
		}
		

		if(!$errors){
			getAdd($data['chiso'],$data['sophong'],$data['lau'],$data['thang']);		
			echo '<script language="javascript">alert("Cảm ơn bạn đã nhập số nước"); window.location="add.php";</script>';
		}
		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Nhập số nước</title>
	<link rel="stylesheet" href="add.css" />
	<script language="javascript" src="add.js"></script>
</head>
<body>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>
<h2 align="center">Số nước tháng <?php echo $date["mon"]-1 ?></h2>	
<form method="POST" action="add.php">

<div class="formgroup" id="name-form">
    <label for="name">Số nước</label>
    <input type="text" name="chiso" value="<?php echo !empty($data['chiso']) ? $data['chiso'] : ''?>" />
					<?php if(!empty($errors['chiso'])) echo $errors['chiso']; ?>
</div>

<div class="formgroup" id="email-form">
    <label for="email">Số phòng</label>
    <input type="text" name="sophong" value="<?php echo !empty($data['sophong']) ? $data['sophong'] : ''?>" />
					<?php if(!empty($errors['sophong'])) echo $errors['sophong']; ?>
</div>

<div class="formgroup" id="message-form">
    <label for="message">Chọn lầu</label>
    <select name="lau">
						<option value="11" <?php if(!empty($data['lau']) && $data['lau']=='11') echo "selected"; ?> >Trệt</option>
						<option value="1" <?php if(!empty($data['lau']) && $data['lau']=='1') echo "selected"; ?> >Lầu 1</option>
						<option value="2" <?php if(!empty($data['lau']) && $data['lau']=='2') echo "selected"; ?> >Lầu 2</option>
						<option value="3" <?php if(!empty($data['lau']) && $data['lau']=='3') echo "selected"; ?> >Lầu 3</option>
						<option value="4" <?php if(!empty($data['lau']) && $data['lau']=='4') echo "selected"; ?> >Lầu 4</option>
						<option value="5" <?php if(!empty($data['lau']) && $data['lau']=='5') echo "selected"; ?> >Lầu 5</option>
						<option value="6" <?php if(!empty($data['lau']) && $data['lau']=='6') echo "selected"; ?> >Lầu 6</option>
						<option value="7" <?php if(!empty($data['lau']) && $data['lau']=='7') echo "selected"; ?> >Lầu 7</option>
						<option value="8" <?php if(!empty($data['lau']) && $data['lau']=='8') echo "selected"; ?> >Lầu 8</option>
						<option value="9" <?php if(!empty($data['lau']) && $data['lau']=='9') echo "selected"; ?> >Lầu 9</option>
						<option value="10" <?php if(!empty($data['lau']) && $data['lau']=='10') echo "selected"; ?> >Lầu 10</option>
					</select>
</div>
<div class="formgroup" id="email-form">
    
					<input type="hidden" name="thang" value="<?php echo $date["mon"]-1?>" >
</div>
	<input type="submit" name="add" value="Gửi số nước">
</form>



</div>
</body>
</html>