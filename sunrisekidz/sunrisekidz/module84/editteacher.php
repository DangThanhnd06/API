<?php
    include("../require_inc.php");
    $id = $_POST['idetc'];
    $data['school_id'] = $_POST['cse'];
    $data['teacher_id'] = str_replace("'","\'",trim($_POST['teacher_ide']));
    $data['fname'] = str_replace("'","\'",trim($_POST['fnamee']));
    $data['mname'] = str_replace("'","\'",$_POST['mnamee']);
    $data['lname'] = str_replace("'","\'",trim($_POST['lnamee']));
    $data['gender'] = str_replace("'","\'",trim($_POST['gendere']));
    $data['nationality'] = str_replace("'","\'",trim($_POST['nationalitye']));
    $data['onumber'] = str_replace("'","\'",trim($_POST['onumbere']));
    $data['mnumber'] = str_replace("'","\'",trim($_POST['mnumbere']));
    $data['email'] = str_replace("'","\'",trim($_POST['emaile']));
    $data['fb'] = str_replace("'","\'",trim($_POST['fbe']));
    $data['class_gr'] = $_POST['class_gre'];
    $data['level'] = $_POST['levele'];
    $data['reportto'] = $_POST['reporttoe'];
    $sci = $_POST['cse'];
    $sss = $h->query("select img from teacher where id=$id");
    $rsss = $h->fetch_array($sss);
    $imgg = $rsss['img']; 
    if($_FILES['img2']['name']!='') {
        if($_FILES["img2"]["type"]=='image/jpeg' || $_FILES["img2"]["type"]=='image/gif' || $_FILES["img2"]["type"]=='image/png' || $_FILES['img2']['type']=='image/jpg') {
            	$path = "../upload/teacher";
	
				$file_tmp = isset($_FILES['img2']['tmp_name']) ? $_FILES['img2']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img2']['name']) ? $_FILES['img2']['name'] : "";
	
				$file_type = isset($_FILES['img2']['type']) ? $_FILES['img2']['type'] : "";
	
				$file_size = isset($_FILES['img2']['size']) ? $_FILES['img2']['size'] : "";
	
				$file_error = isset($_FILES['img2']['error']) ? $_FILES['img2']['error'] : "";
	
				move_uploaded_file($_FILES['img2']['tmp_name'],$path."/".$id.'-'.$_FILES['img2']['name']);
        }
        $data['img'] = $id.'-'.$_FILES['img2']['name'];
    } else $data['img'] = $imgg;
    $stc = $h->query("select id from teacher where teacher_id='".$data['teacher_id']."' and id!=$id");
    $ntc = $h->num_rows($stc);
    if($ntc) echo '3';
    else {
        $ss = $h->query("select id from teacher where email='".$data['email']."' and id!=$id");
        $ns = $h->num_rows($ss);
        if($ns) echo '2';
        else {
            $sl = $h->query("select level from teacher where id=$id");
            $rl = $h->fetch_array($sl);
            $leva = $rl['level'];
            if($leva != $data['level']) {
                if($data['level']==1) {
                    $data2['fromm'] = "2";
                    $data2['too'] = "1";    
                } else {
                    $data2['fromm'] = "2";
                    $data2['too'] = "1";
                }
                $time = gmdate("H:i:s", time()+7*3600);
                $data2['date'] = date("d/m/Y $time");
                $data2['forr'] = $id;
                $data2['accountname'] = 0;
                $data2['actiondetail'] = 3;
                $slog = $h->insert($data2,"log");
            }
            $s = $h->update($data,"teacher"," where id=$id");
            $ssau = $h->query("select * from teacher where id=$id");
            $rg = $h->fetch_array($ssau);
            if($lang == 'vn') {
                                $tgv = $rg['fname'].' '.$rg['mname'];
                            }
                            else
                                $tgv = change($rg['fname'].' '.$rg['mname']);
                            if($rg['gender']==1) $gd = _male;
                            else $gd = _female;
                            if($rg['level']==1) $le = _headteacher;
                            else $le = _teacher;
                            $rp = $rg['reportto'];
                            if($rp == 0) $rpt = _principle;
                            else {
                                $sp  = $h->query("select fname,mname,lname from teacher where id=$rp");
                                $rsp = $h->fetch_array($sp);
                                if($lang=='vn')
                                    $rpt = $rsp['fname'].' '.$rsp['mname'];
                                else
                                    $rpt = change($rsp['fname'].' '.$rsp['mname']); 
                            }
            $msr .= '<div class="lleft">';
            $msr .= '   <div class="img">';
            $msr .= '       <div class="nen"><img src="'.URL.'img/bg_anhdd.png" alt="background anh do bong" /></div>';
            $msr .= '       <div class="anh"><img src="'.URL.'upload/teacher/'.$rg['img'].'" alt="GV" /></div>';
            $msr .= '       <div class="editi"><a class="edititc" rel="'.$rg['id'].'"><img src="'.URL.'img/edit_img.png" alt="Edit image" /></a></div>';
            $msr .= '   </div>';
            $msr .= '   <div class="lv"><p>'._level.'</p><strong><span id="levell">'.$le.'</span></strong><div class="editlv"><a class="elv" rel="'.$rg['id'].'"><img src="'.URL.'img/icon_edit.png" alt="Edit level teacher" style="height: 100%;" /></a></div></div>';
            $msr .= '   <div class="rp"><p>'._reportto.'</p><strong>'.$rpt.'</strong></div>';
            $msr .= '</div>';
            $msr .= '<div class="rright">';
            $msr .= '   <p><strong>'._teacherid.': </strong>'.$rg['teacher_id'].'</p>';
            $msr .= '   <p><strong>'._fname.': </strong>'.$rg['fname'].'</p>';
            $msr .= '   <p><strong>'._mname.': </strong>'.$rg['mname'].'</p>';
            $msr .= '   <p><strong>'._lname.': </strong>'.$rg['lname'].'</p>';
            $msr .= '   <p><strong>'._gender.': </strong>'.$gd.'</p>';
            $msr .= '   <p><strong>'._nationality.': </strong>'.$rg['nationality'].'</p>';
            $msr .= '   <p><strong>'._onumber.': </strong>'.$rg['onumber'].'</p>';
            $msr .= '   <p><strong>'._mnumber.': </strong>'.$rg['mnumber'].'</p>';
            $msr .= '   <p><strong>'._emailaddress.': </strong>'.$rg['email'].'</p>';
            $msr .= '   <p><strong>'._fbaccount.': </strong>'.$rg['fb'].'</p>';
            $msr .= '   <p><strong>'._classgr.': </strong>'.$rg['class_gr'].'</p>';
            $msr .= '</div>';
            $msr .= '<p class="clr"></p>';
            $msr .= '<p class="edittc"><a class="edittcher" rel="'.$rg['id'].'">'._edit.'</a></p>';
            
            $sht = $h->query("select id,fname,mname,lname from teacher where level=1 and school_id=$sci and hide=1 order by sort asc,id asc");
            $msg = "";
            while($rht = $h->fetch_array($sht)){
                $idht = $rht['id'];
                if($lang == 'vn')
                    $tengvht = $rht['fname'].' '.$rht['mname'];
                else
                    $tengvht = change($rht['fname'].' '.$rht['mname']);
                    if($rht['id']==$id && $rht['id']!=$data['reportto'])
                        $msg .= '<li class="act"><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a>';
                    elseif($rht['id']!=$id && $rht['id']!=$data['reportto'])
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a>';
                    elseif($rht['id']!=$id && $rht['id']==$data['reportto'])
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="1"><img src="img/down_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a>';
                    else
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a>';
                    $sgv = $h->query("select id,fname,mname,lname from teacher where level=2 and school_id=$sci and hide=1 and reportto=$idht order by sort,id");
                    $n = $h->num_rows($sgv);
                    if($n){
                        if($rht['id']==$data['reportto'])
                            $msg .= '<ul id="'.$idht.'" class="act">';
                        else
                            $msg .= '<ul id="'.$idht.'">';
                        while($rgv = $h->fetch_array($sgv)){
                            if($langg == 'vn')
                                $tengv = $rgv['fname'].' '.$rgv['mname'];
                            else
                                $tengv = change($rgv['fname'].' '.$rgv['mname']);
                            if($rgv['id']==$id)
                                $msg .= '<li class="act"><a class="xemgv" rel="'.$rgv['id'].'">'.$tengv.'</a></li>';
                            else
                                $msg .= '<li><a class="xemgv" rel="'.$rgv['id'].'">'.$tengv.'</a></li>';
                        }
                        $msg .= '</ul>';
                    }
                $msg .= '</li>';
            }
            
            
            echo "1;;;".$msr.";;;".$msg;
        }
    }
    
?>                  