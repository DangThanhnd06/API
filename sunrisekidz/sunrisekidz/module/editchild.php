<?php
    include("../require_inc.php");
    $id = $_POST['id_editc'];
    $data['school_id'] = $_POST['cse'];
    $data['children_id'] = str_replace("'","\'",trim($_POST['children_ide']));
    $data['fname'] = str_replace("'","\'",trim($_POST['fnamee']));
    $data['mname'] = str_replace("'","\'",trim($_POST['mnamee']));
    $data['fullname'] = str_replace("'","\'",trim($_POST['fnamee'])).' '.str_replace("'","\'",trim($_POST['mnamee']));
    $data['lname'] = str_replace("'","\'",trim($_POST['lnamee']));
    $data['characteristic'] = str_replace("'","\'",trim($_POST['characteristic']));
    $data['gender'] = str_replace("'","\'",trim($_POST['gendere']));
    $data['nationality'] = str_replace("'","\'",trim($_POST['nationalitye']));
    $data['dob'] = str_replace("'","\'",trim($_POST['dobe']));
    $data['cage'] = $_POST['cagee'];
    $data['class_gr'] = $_POST['class_gre'];
    $data['teacher_id'] = $_POST['teacher_id'];
    if($_FILES['img4']['name']!='') {
        if($_FILES["img4"]["type"]=='image/jpeg' || $_FILES["img4"]["type"]=='image/gif' || $_FILES["img4"]["type"]=='image/png' || $_FILES['img4']['type']=='image/jpg') {
            	$path = "../upload/children";
	
				$file_tmp = isset($_FILES['img4']['tmp_name']) ? $_FILES['img4']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img4']['name']) ? $_FILES['img4']['name'] : "";
	
				$file_type = isset($_FILES['img4']['type']) ? $_FILES['img4']['type'] : "";
	
				$file_size = isset($_FILES['img4']['size']) ? $_FILES['img4']['size'] : "";
	
				$file_error = isset($_FILES['img4']['error']) ? $_FILES['img4']['error'] : "";
	
				move_uploaded_file($_FILES['img4']['tmp_name'],$path."/".time().'-'.chuoianh($_FILES['img4']['name']));
        }
        $data['img'] = time().'-'.chuoianh($_FILES['img4']['name']);
    }
    $stc = $h->query("select id from children where children_id='".$data['children_id']."' and id!=$id and hide=1");
    $ntc = $h->num_rows($stc);
    if($ntc) echo '2';
    else {
        $ss = $h->update($data,"children"," where id=$id");
        $sau = $h->query("select * from children where id=$id and hide=1");
        $rg = $h->fetch_array($sau);
        if($lang=='vn') $fn = $rg['fname']; else $fn = change($rg['fname']); 
        if($lang=='vn') $min = $rg['mname']; else $min = change($rg['mname']);
        if($lang=='vn') $lnam = $rg['lname']; else $lnam = change($rg['lname']);
        if($lang=='vn') $nat = $rg['nationality']; else $nat = change($rg['nationality']);
        $teacher_id = $rg['teacher_id'];
        $stc = $h->query("select fname,mname from teacher where id=$teacher_id");
        $rtc = $h->fetch_array($stc);
        if($lang=='vn') $teach = $rtc['fname'].' '.$rtc['mname'];
        else $teach = change($rtc['fname'].' '.$rtc['mname']);
        if($rg['gender']==1) $gender = _male;
        else $gender = _female;
        $tinhcach = $rg['characteristic'];
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
        $sc = $h->query("select tieude from school_brand where id=$sci");
        $rc = $h->fetch_array($sc);
        $school = $rc["tieude"];
        $msr = "";
        $msr .= '<div class="lleft">';
        $msr .= '   <div class="img">';
        $msr .= '       <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>';
        if($rg['img']!='')
            $msr .= '       <div class="anh" id="childimg"><img src="upload/children/'.$rg['img'].'" alt="HS" /></div>';
        else
            $msr .= '       <div class="anh" id="childimg"><img src="img/noimg.png" alt="HS" /></div>';
        $msr .= '       <div class="editi"><a class="editicr" rel="'.$id.'"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>';
        $msr .= '   </div>';
        $msr .= '</div>';
        $msr .= '<div class="rright">';
        $msr .= '   <input type="hidden" id="idcrrr" value="'.$id.'" />';
        $msr .= '   <p><strong>'._childrenid.': </strong>'.$rg['children_id'].'</p>';
        $msr .= '   <p><strong>'._fname.': </strong>'.$fn.'</p>';
        $msr .= '   <p><strong>'._mname.': </strong>'.$min.'</p>';
        $msr .= '   <p><strong>'._lname.': </strong>'.$lnam.'</p>';
        $msr .= '   <p><strong>'._gender.': </strong>'.$gender.'</p>';
        $msr .= '   <p><strong>'._tinhcach.': </strong>'.$tinhcach.'</p>';
        $msr .= '   <p><strong>'._nationality.': </strong>'.$nat.'</p>';
        $msr .= '   <p><strong>'._dob.': </strong>'.$rg['dob'].'</p>';
        $msr .= '   <p><strong>'._currentage.': </strong>'.$ca.'</p>';
        $msr .= '   <p><strong>'._tenchinhanh.': </strong>'.$school.'</p>';
        $msr .= '   <p><strong>'._classgr.': </strong>'.$rg['class_gr'].'</p>';
        $msr .= '   <p><strong>'._teacher.': </strong>'.$teach.'</p>';
        $msr .= '</div>';
        $msr .= '<p class="clr"></p>';
        $msr .= '<p class="edittc"><a class="edit_child" rel="'.$id.'">'._edit.'</a></p>';
        $msg = "";
        $sc = $h->query("select id,fname,mname from children where hide=1 order by fname asc");
        $i = 0;
        while($rc = $h->fetch_array($sc)){
            if($i%2==0) $cl = 'class="even"';
            else $cl = 'class="odd"';
            ++$i;
            if($lang == 'vn') $fullname = $rc['fname'].' '.$rc['mname'];
            else $fullname = change($rc['fname'].' '.$rc['mname']);
            $msg .= '<li '.$cl.'><a class="xemhs" rel="'.$rc['id'].'"><span class="numb">'.$i.'</span>'.$fullname.'</a><a class="delhs" rel="'.$rc['id'].'">&nbsp;</a></li>';
        }
        echo '1;;;'.$msg.';;;'.$msr;
    }
    
?>                  