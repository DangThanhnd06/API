<?php
    include("../require_inc.php");
    /*$p = '123456';
    $data['school_id'] = $_POST['cs'];
    $data['children_id'] = str_replace("'","\'",trim($_POST['children_id']));*/
    $data['fname'] = str_replace("'","\'",trim($_POST['fname']));
    $data['mname'] = str_replace("'","\'",$_POST['mname']);
    /*$data['lname'] = str_replace("'","\'",trim($_POST['lname']));
    $data['gender'] = str_replace("'","\'",trim($_POST['gender']));
    $data['nationality'] = str_replace("'","\'",trim($_POST['nationality']));
    $data['dob'] = str_replace("'","\'",trim($_POST['dob']));
    $data['cage'] = $_POST['cage'];
    $data['class_gr'] = $_POST['class_gr'];
    $data['password_f'] = mahoa($p);
    $data['password_m'] = mahoa($p);
    // father
    $data['father_name'] = str_replace("'","\'",trim($_POST['father_name']));
    $data['father_number'] = str_replace("'","\'",trim($_POST['father_number']));
    $data['father_email'] = str_replace("'","\'",trim($_POST['father_email']));
    $data['father_address'] = str_replace("'","\'",trim($_POST['father_address']));
    if($_FILES['imgc']['name']!='') {
        if($_FILES["imgc"]["type"]=='image/jpeg' || $_FILES["imgc"]["type"]=='image/gif' || $_FILES["imgc"]["type"]=='image/png' || $_FILES['imgc']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['imgc']['tmp_name']) ? $_FILES['imgc']['tmp_name'] : "";
	
				$file_name = isset($_FILES['imgc']['name']) ? $_FILES['imgc']['name'] : "";
	
				$file_type = isset($_FILES['imgc']['type']) ? $_FILES['imgc']['type'] : "";
	
				$file_size = isset($_FILES['imgc']['size']) ? $_FILES['imgc']['size'] : "";
	
				$file_error = isset($_FILES['imgc']['error']) ? $_FILES['imgc']['error'] : "";
	
				move_uploaded_file($_FILES['imgc']['tmp_name'],$path."/".time().'-'.$_FILES['imgc']['name']);
        }
        $data['father_img'] = time().'-'.$_FILES['imgc']['name'];
    } else $data['father_img'] = '';
    // mother
    $data['mother_name'] = str_replace("'","\'",trim($_POST['mother_name']));
    $data['mother_number'] = str_replace("'","\'",trim($_POST['mother_number']));
    $data['mother_email'] = str_replace("'","\'",trim($_POST['mother_email']));
    $madd = str_replace("'","\'",trim($_POST['mother_address']));
    if($madd != "") $data['mother_address'] = $madd;
    else $data['mother_address'] = $data['father_address'];
    if($_FILES['imgm']['name']!='') {
        if($_FILES["imgm"]["type"]=='image/jpeg' || $_FILES["imgm"]["type"]=='image/gif' || $_FILES["imgm"]["type"]=='image/png' || $_FILES['imgm']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['imgm']['tmp_name']) ? $_FILES['imgm']['tmp_name'] : "";
	
				$file_name = isset($_FILES['imgm']['name']) ? $_FILES['imgm']['name'] : "";
	
				$file_type = isset($_FILES['imgm']['type']) ? $_FILES['imgm']['type'] : "";
	
				$file_size = isset($_FILES['imgm']['size']) ? $_FILES['imgm']['size'] : "";
	
				$file_error = isset($_FILES['imgm']['error']) ? $_FILES['imgm']['error'] : "";
	
				move_uploaded_file($_FILES['imgm']['tmp_name'],$path."/".time().'-'.$_FILES['imgm']['name']);
        }
        $data['mother_img'] = time().'-'.$_FILES['imgm']['name'];
    } else $data['mother_img'] = '';
    */
    $time = gmdate("H:i:s", time()+7*3600);
	$data['redate'] = date("d/m/Y $time");
    $data['hide'] = 1;
    /*
    if($_FILES['img']['name']!='') {
        if($_FILES["img"]["type"]=='image/jpeg' || $_FILES["img"]["type"]=='image/gif' || $_FILES["img"]["type"]=='image/png' || $_FILES['img']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
	
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
	
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
	
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
	
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".time().'-'.$_FILES['img']['name']);
        }
        $data['img'] = time().'-'.$_FILES['img']['name'];
    }
    $stc = $h->query("select id from children where children_id='".$data['children_id']."'");
    $ntc = $h->num_rows($stc);
    if($ntc) echo '2';
    else {*/
        $ss = $h->insert($data,"children");
        $sc = $h->query("select id,fname,mname from children order by fname asc");
                            $i = 0;
                            while($rc = $h->fetch_array($sc)){
                                if($i%2==0) $cl = 'class="even"';
                                else $cl = 'class="odd"';
                                ++$i;
                                if($lang == 'vn') $fullname = $rc['fname'].' '.$rc['mname'];
                                else $fullname = change($rc['fname'].' '.$rc['mname']);
                                $msg .= '<li '.$cl.'><a class="xemhs" rel="'.$rc['id'].'"><span class="numb">'.$i.'</span>'.$fullname.'</a></li>';
                            }
        echo $msg;
    #}
    
?>