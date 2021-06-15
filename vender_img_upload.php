n<?php
include 'db_connect.php';
$im_id = $_POST['im_id'];
if(isset($_POST['submit']))
{
	$extension=array('jpeg','jpg','png', 'pdf');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		if(in_array($ext,$extension))
		{
			if(!file_exists('assets/vender_images/'.$filename))
			{
			move_uploaded_file($filename_tmp, 'assets/vender_images/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, 'assets/vender_images/'.$newfilename);
				 $finalimg=$newfilename;
				 
			}
			//insert
			$insertqry="INSERT INTO `vender_img`(`vender_id`, `img_name`) VALUES ($im_id,'$finalimg')";
			mysqli_query($conn,$insertqry);
		
			header('Location: index.php?page=image_venders&id='.$im_id);
		}
		else
		{
			header('Location: index.php?page=image_venders&id='.$im_id);
		}
	}
}
?>