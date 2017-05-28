<?php 
	$SERVER= "localhost"; 
	$USERNAME= "root"; 
	$PASSWORD= "12345"; 
	$DBNAME= "lokisneaker"; 
	$conn= mysql_connect($SERVER, $USERNAME, $PASSWORD, false, 65536); 
	if ( !$conn) { 
	//Không kết nối được, thoát ra và báo lỗi
		die("Không nết nối được vào MySQL server"); 
	} //end if 
	
	//chọn CSDL đểlàm việc
	mysql_select_db($DBNAME, $conn);
	mysql_set_charset('utf8',$conn);
	//đóng kết nối
	//mysql_close($conn); 
?> 