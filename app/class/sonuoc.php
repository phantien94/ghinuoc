<?php

	global $conn;

	function connect_db(){
		global $conn;

		if(!$conn){
			$conn = mysqli_connect('localhost','root','','ghinuoc') or die ('Can\'t connect database');
			mysqli_set_charset($conn,'utf8');
		}
	}

	function disconnect_db()
	{
	    // Gọi tới biến toàn cục $conn
	    global $conn;
	     
	    // Nếu đã kêt nối thì thực hiện ngắt kết nối
	    if ($conn){
	        mysqli_close($conn);
	    }
	}

	function getlist(){
		global $conn;

		connect_db();

		$sql = "select * from sonuoc";
		$query = mysqli_query($conn,$sql);
		$result = array();

		if($query){
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}

		return $result;
	}


	function getAdd($chiso,$sophong,$lau,$thang){
		global $conn;

		connect_db();

		$chiso = addslashes($chiso);
		$sophong = addslashes($sophong);
		$lau = addslashes($lau);
		$thang = addslashes($thang);

		$sql = "select * from sonuoc where sophong='$sophong' AND thang='$thang'";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			echo '<script language="javascript">alert("Số nước phòng này đã có"); window.location="add.php";</script>';
          
      		// Dừng chương trình
        	die ();
		}
		else {
			$sql = "insert into sonuoc(chiso,sophong,lau,thang) values ('$chiso','$sophong','$lau','$thang')";

			$query = mysqli_query($conn, $sql);
     
    		return $query;
		}
		
	}

	function sophongValidate($str){
		return (!preg_match("/^[a-z0-9]{1,6}$/", $str)) ? FALSE : TRUE;
	}

	function sonuocValidate($str){
		return (!preg_match("/^[0-9]{1,10}$/", $str)) ? FALSE : TRUE;
	}
?>