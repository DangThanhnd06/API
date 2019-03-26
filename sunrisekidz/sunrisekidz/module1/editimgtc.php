<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    if($_FILES['img1']['name']!='') {
        if($_FILES["img1"]["type"]=='image/jpeg' || $_FILES["img1"]["type"]=='image/gif' || $_FILES["img1"]["type"]=='image/png' || $_FILES['img1']['type']=='image/jpg') {
            	$path = "../upload/teacher";
	
				$file_tmp = isset($_FILES['img1']['tmp_name']) ? $_FILES['img1']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img1']['name']) ? $_FILES['img1']['name'] : "";
	
				$file_type = isset($_FILES['img1']['type']) ? $_FILES['img1']['type'] : "";
	
				$file_size = isset($_FILES['img1']['size']) ? $_FILES['img1']['size'] : "";
	
				$file_error = isset($_FILES['img1']['error']) ? $_FILES['img1']['error'] : "";
	
				move_uploaded_file($_FILES['img1']['tmp_name'],$path."/".$id.'-'.$_FILES['img1']['name']);
        }
        $data['img'] = $id.'-'.$_FILES['img1']['name'];
    }
    $img = $id.'-'.$_FILES['img1']['name'];
    $s = $h->update($data,"teacher"," where id=$id");
    echo $img;
?>