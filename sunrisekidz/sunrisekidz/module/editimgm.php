<?php
    include("../require_inc.php");
    $id = $_POST['idm'];
    if($_FILES['img3']['name']!='') {
        if($_FILES["img3"]["type"]=='image/jpeg' || $_FILES["img3"]["type"]=='image/gif' || $_FILES["img3"]["type"]=='image/png' || $_FILES['img3']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['img3']['tmp_name']) ? $_FILES['img3']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img3']['name']) ? $_FILES['img3']['name'] : "";
	
				$file_type = isset($_FILES['img3']['type']) ? $_FILES['img3']['type'] : "";
	
				$file_size = isset($_FILES['img3']['size']) ? $_FILES['img3']['size'] : "";
	
				$file_error = isset($_FILES['img3']['error']) ? $_FILES['img3']['error'] : "";
	
				move_uploaded_file($_FILES['img3']['tmp_name'],$path."/".$id.'-'.chuoianh($_FILES['img3']['name']));
        }
        $data['mother_img'] = $id.'-'.chuoianh($_FILES['img3']['name']);
    }
    $img = $id.'-'.chuoianh($_FILES['img3']['name']);
    $s = $h->update($data,"children"," where id=$id");
    echo $img;
?>