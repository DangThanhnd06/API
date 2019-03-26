<?php
    include("../require_inc.php");
    $id = $_POST['id_editc'];
    $data['school_id'] = $_POST['cse'];
    $data['children_id'] = str_replace("'","\'",trim($_POST['children_ide']));
    $data['fname'] = str_replace("'","\'",trim($_POST['fnamee']));
    $data['mname'] = str_replace("'","\'",$_POST['mnamee']);
    $data['lname'] = str_replace("'","\'",trim($_POST['lnamee']));
    $data['gender'] = str_replace("'","\'",trim($_POST['gendere']));
    $data['nationality'] = str_replace("'","\'",trim($_POST['nationalitye']));
    $data['dob'] = str_replace("'","\'",trim($_POST['dobe']));
    $data['cage'] = $_POST['cagee'];
    $data['class_gr'] = $_POST['class_gre'];
    if($_FILES['img4']['name']!='') {
        if($_FILES["img4"]["type"]=='image/jpeg' || $_FILES["img4"]["type"]=='image/gif' || $_FILES["img4"]["type"]=='image/png' || $_FILES['img4']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['img4']['tmp_name']) ? $_FILES['img4']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img4']['name']) ? $_FILES['img4']['name'] : "";
	
				$file_type = isset($_FILES['img4']['type']) ? $_FILES['img4']['type'] : "";
	
				$file_size = isset($_FILES['img4']['size']) ? $_FILES['img4']['size'] : "";
	
				$file_error = isset($_FILES['img4']['error']) ? $_FILES['img4']['error'] : "";
	
				move_uploaded_file($_FILES['img4']['tmp_name'],$path."/".time().'-'.$_FILES['img4']['name']);
        }
        $data['img'] = time().'-'.$_FILES['img4']['name'];
    }
    $stc = $h->query("select id from children where children_id='".$data['children_id']."' and id!=$id");
    $ntc = $h->num_rows($stc);
    if($ntc) echo '2';
    else {
        $ss = $h->update($data,"children"," where id=$id");
        $sau = $h->query("select * from children where id=$id");
        $rg = $h->fetch_array($sau);
        if($lang=='vn') $fn = $rg['fname']; else $fn = change($rg['fname']); 
        if($lang=='vn') $min = $rg['mname']; else $min = change($rg['mname']);
        if($lang=='vn') $lnam = $rg['lname']; else $lnam = change($rg['lname']);
        if($lang=='vn') $nat = $rg['nationality']; else $nat = change($rg['nationality']);
        if($rg['gender']==1) $gender = _male;
        else $gender = _female;
        switch($rg['cage']){
            case 1:
                $ca = '18 - 24 '._month;
                break;
            case 2:
                $ca = '24 - 36 '._month;
                break;
            case 3:
                $ca = '3 - 4 '._yearold;
                break;
            case 4:
                $ca = '4 - 5 '._yearold;
                break;
            case 5:
                $ca = '5 - 6 '._yearold;
                break;
        }
        $sci = $rg['school_id'];
        $sc = $h->query("select tieude_vn,tieude_en from school_brand where id=$sci");
        $rc = $h->fetch_array($sc);
        $school = $rc["tieude_$lang"];
        $msr = "";
        $msr .= '<div class="lleft">';
        $msr .= '   <div class="img">';
        $msr .= '       <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>';
        $msr .= '       <div class="anh" id="childimg"><img src="upload/children/'.$rg['img'].'" alt="HS" /></div>';
        $msr .= '       <div class="editi"><a class="editicr" rel="'.$id.'"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>';
        $msr .= '   </div>';
        $msr .= '</div>';
        $msr .= '<div class="rright">';
        $msr .= '   <p><strong>'._childrenid.': </strong>'.$rg['children_id'].'</p>';
        $msr .= '   <p><strong>'._fname.': </strong>'.$fn.'</p>';
        $msr .= '   <p><strong>'._mname.': </strong>'.$min.'</p>';
        $msr .= '   <p><strong>'._lname.': </strong>'.$lnam.'</p>';
        $msr .= '   <p><strong>'._gender.': </strong>'.$gender.'</p>';
        $msr .= '   <p><strong>'._nationality.': </strong>'.$nat.'</p>';
        $msr .= '   <p><strong>'._dob.': </strong>'.$rg['dob'].'</p>';
        $msr .= '   <p><strong>'._currentage.': </strong>'.$ca.'</p>';
        $msr .= '   <p><strong>'._tenchinhanh.': </strong>'.$school.'</p>';
        $msg .= '   <p><strong>'._classgr.': </strong>'.$r['class_gr'].'</p>';
        $msr .= '</div>';
        $msr .= '<p class="clr"></p>';
        $msr .= '<p class="edittc"><a class="edit_child" rel="'.$id.'">'._edit.'</a></p>';
        $msg = "";
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
        echo '1;;;'.$msg.';;;'.$msr;
    }
    
?>                  