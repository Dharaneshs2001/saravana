<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
session_start(); 
include('includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//$framesize=mysql_real_escape_string($_POST['framesize']);
	//$fsize='1';
	$framesize=mysql_real_escape_string($_POST['framesize']);
	$ftype=mysql_real_escape_string($_POST['ftype']);
		$uid = $_SESSION['id'];
			
			 $result = mysql_query("SELECT max(sno)as max FROM frame");
									 $row = mysql_fetch_array($result);
									 $id=$row['max']+1;
											
											if($_FILES["file"]["name"]<>"")
											{								
												$filename=$id;				
												$allowedExts = array("jpg","png","bmp","gif","jpeg","pdf");
												$temp = explode(".", $_FILES["file"]["name"]);
												$extension = end($temp);
												if (in_array($extension, $allowedExts))
												{
												move_uploaded_file($_FILES["file"]["tmp_name"],"frame/$filename.$extension" );
												}
												$path="frame/$filename.$extension";		 
											}
									
									 

mysql_query ("insert into frame(framesize,ftype,sno,path,uid) values ('$framesize','$ftype','$id','$path','$uid')");

echo '<script language="javascript">';
echo 'alert("Frame Ordered Successfully!")';
echo '</script>';

}
?>

<form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					  
					   <select class="form-control unicase-form-control text-input" name="framesize" required>
                        	<option value=""> Choose Frame Size </option>
                            <option value="8x10"> 8" x 10" </option>
                            <option value="11x14"> 11" x 14"	 </option>
                            <option value="16x20"> 16" x 20" </option>
                            <option value="20x24"> 20" x 24" </option>
                            <option value="24x36"> 24" x 36" </option>
                            <option value="30x40"> 30" x 40" </option>
                        </select>
                      
                      
					    <select class="form-control unicase-form-control text-input" name="ftype" required>
                        	<option value=""> Choose Frame Type </option>
                            <option value="Wooden"> Wooden </option>
                            <option value="Glass"> Glass	 </option>
                            <option value="Plastic"> Plastic </option>
                        </select>
					  
					    <label class="info-title" for="Billing State ">Sample Photo <span>*</span></label>
			 			<input type="file" class="form-control unicase-form-control text-input" required name="file" required>
					 
                      <input type="submit" value="Order"  class="btn-upper btn btn-primary checkout-page-button" name="btnSubmit">
					</form>
</body>
</html>