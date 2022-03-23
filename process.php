<?php
if(isset($_POST["newfullname"])  && isset($_POST["newid"]) && isset($_POST["newemail"]) && isset($_POST["newmajor"]) && isset($_POST["newyear"]))
{	

	$fullname = $_POST["newfullname"];
    $id = $_POST["newid"];
    $email = $_POST["newemail"];
    $major = $_POST["newmajor"];
    $year = $_POST["newyear"];
    $db_connection = mysqli_connect("localhost","root","","hubing");
    $result = mysqli_query($db_connection,"INSERT INTO `student`(`HoVaTen`, `MSSV`, `Email`, `Khoa`, `NienKhoa`) VALUES('$fullname', '$id', '$email', '$major', '$year')");
	if($result == true)
    {
        echo '<div class="alert alert-success content-update" id="message">
        <button type="button" class="close" data-dismiss="alert">&times;
        </button>' .$fullname . '<span>Updated</span>' .'</div>';		

    }
    else
	{
		echo  '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Fail to Register</div>';		
	}
	
}

if(isset($_POST['MSSV']))
{
    $MSSV = $_POST['MSSV'];
    $db_connection = mysqli_connect("localhost","root","","hubing");
    $query = mysqli_query($db_connection,"SELECT `NgaySinh`, `CMND`, `SDT`, `QueQuan`, `DiaChiTamTru`, `HoTenCha`, `HoTenMe`, `SDTCha` FROM `student` 
    WHERE `MSSV` = '$MSSV'");
    while($temp = $query ->fetch_assoc())
    {
        echo '<span class="info-list_heading">Ngày sinh:</span><input class="info-list_input" id="NgaySinh" type="hidden"></input><span class="info-list-name" id="NgaySinhspan" >' . $temp['NgaySinh'] . '</span><br/>';
        echo '<span class="info-list_heading">CMND/CCCD:</span><input class="info-list_input" id="CMND" type="hidden"></input><span class="info-list-name" id="CMNDspan" >' . $temp['CMND'] . '</span><br/>';
        echo '<span class="info-list_heading">Số điện thoại:</span><input class="info-list_input" id="SDT" type="hidden"></input><span class="info-list-name" id="SDTspan" >' . $temp['SDT'] . '</span><br/>';
        echo '<span class="info-list_heading">Quê quán:</span><input class="info-list_input" id="QueQuan" type="hidden"></input><span class="info-list-name" id="QueQuanspan" >' . $temp['QueQuan'] . '</span><br/>';
        echo '<span class="info-list_heading">Địa chỉ tạm trú:</span><input class="info-list_input" id="DiaChiTamTru" type="hidden"></input><span class="info-list-name" id="DiaChiTamTruspan" >' . $temp['DiaChiTamTru'] . '</span><br/>';
        echo '<span class="info-list_heading">Họ và tên cha:</span><input class="info-list_input" id="HoTenCha" type="hidden"></input><span class="info-list-name" id="HoTenChaspan" >' . $temp['HoTenCha'] . '</span><br/>';
        echo '<span class="info-list_heading">Họ và tên mẹ:</span><input class="info-list_input" id="HoTenMe" type="hidden"></input><span class="info-list-name" id="HoTenMespan" >' . $temp['HoTenMe'] . '</span><br/>';
        echo '<span class="info-list_heading">SĐT người giám hộ:</span><input class="info-list_input" id="SDTCha" type="hidden"></input><span class="info-list-name" id="SDTChaspan" >' . $temp['SDTCha'] . '</span><br/>';
    }
}

if(isset($_POST['MSSV1']))
{
    $MSSV = $_POST['MSSV1'];
    $db_connection = mysqli_connect("localhost","root","","hubing");
    $query = mysqli_query($db_connection,"SELECT `HoVaTen`, `MSSV`, `Email`, `Khoa`, `NienKhoa` FROM `student` 
    WHERE `MSSV` = '$MSSV'");
    while($temp = $query ->fetch_assoc())
    {
        echo '<span class="info-list_heading">Họ và tên:</span><input class="info-list_input" id="HoVaTen" type="hidden"></input><span class="info-list-name" id="HoVaTenspan">' . $temp['HoVaTen'] . '</span><br/>';
        echo '<span class="info-list_heading">MSSV:</span><input class="info-list_input" id="MSSV" type="hidden"></input><span class="info-list-name" id="MSSVspan">' . $temp['MSSV'] . '</span><br/>';
        echo '<span class="info-list_heading">Email:</span><input class="info-list_input" id="Email" type="hidden"></input><span class="info-list-name" id="Emailspan">' . $temp['Email'] . '</span><br/>';
        echo '<span class="info-list_heading">Niên khoá:</span><input class="info-list_input" id="NienKhoa" type="hidden"></input><span class="info-list-name" id="NienKhoaspan">' . $temp['NienKhoa'] . '</span><br/>';
        echo '<span class="info-list_heading">Chuyên ngành:</span><input class="info-list_input" id="Khoa" type="hidden"></input><span class="info-list-name" id="Khoaspan">' . $temp['Khoa'] . '</span><br/>';
    }
}

if(isset($_POST['MSSV2']))
{
    $MSSV = $_POST['MSSV2'];
    $db_connection = mysqli_connect("localhost","root","","hubing");
    mysqli_query($db_connection,"DELETE FROM `student` WHERE `MSSV` = '$MSSV'");
    echo("success");
}

if(isset($_POST['student']))
{
    $student = $_POST['student'];
    $db_connection = mysqli_connect("localhost","root","","hubing");
    $query = mysqli_query($db_connection,"UPDATE `student` SET `MSSV`='{$student[1]}',`HoVaTen`='{$student[0]}',`CMND`='{$student[6]}',
    `SDT`='{$student[7]}',`Email`='{$student[2]}',`QueQuan`='{$student[8]}',`DiaChiTamTru`='{$student[9]}',`Khoa`='{$student[4]}',
    `NgaySinh`='{$student[5]}',`NienKhoa`='{$student[3]}',`HoTenCha`='{$student[10]}',`SDTCha`='{$student[12]}',`HoTenMe`='{$student[11]}' WHERE `MSSV` = '$student[1]'");
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
</html>