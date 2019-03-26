<?php
    include("../require_inc.php");
    $id = $_POST['idf'];
    if($_FILES['img2']['name']!='') {
        if($_FILES["img2"]["type"]=='image/jpeg' || $_FILES["img2"]["type"]=='image/gif' || $_FILES["img2"]["type"]=='image/png' || $_FILES['img2']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['img2']['tmp_name']) ? $_FILES['img2']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img2']['name']) ? $_FILES['img2']['name'] : "";
	
				$file_type = isset($_FILES['img2']['type']) ? $_FILES['img2']['type'] : "";
	
				$file_size = isset($_FILES['img2']['size']) ? $_FILES['img2']['size'] : "";
	
				$file_error = isset($_FILES['img2']['error']) ? $_FILES['img2']['error'] : "";
	
				move_uploaded_file($_FILES['img2']['tmp_name'],$path."/".$id.'-'.$_FILES['img2']['name']);
        }
        $data['father_img'] = $id.'-'.$_FILES['img2']['name'];
    }
    $img = $id.'-'.$_FILES['img2']['name'];
    $s = $h->update($data,"children"," where id=$id");
    echo $img;
?>