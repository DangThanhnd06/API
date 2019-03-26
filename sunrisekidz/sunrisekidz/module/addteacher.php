<?php
    include("../require_inc.php");
    $p = '123456';
    $data['school_id'] = $_POST['cs'];
    //$data['teacher_id'] = str_replace("'","\'",trim($_POST['teacher_id']));
    $data['fname'] = str_replace("'","\'",trim($_POST['fname']));
    $data['mname'] = str_replace("'","\'",$_POST['mname']);
    $data['lname'] = str_replace("'","\'",trim($_POST['lname']));
    /*$data['gender'] = str_replace("'","\'",trim($_POST['gender']));
    $data['nationality'] = str_replace("'","\'",trim($_POST['nationality']));
    $data['onumber'] = str_replace("'","\'",trim($_POST['onumber']));
    $data['mnumber'] = str_replace("'","\'",trim($_POST['mnumber']));*/
    $data['email'] = str_replace("'","\'",trim($_POST['email']));
    $data['password'] = mahoa($p);
    //$data['fb'] = str_replace("'","\'",trim($_POST['fb']));
    //$data['class_gr'] = $_POST['class_gr'];
    $data['level'] = $_POST['level'];
    $data['reportto'] = $_POST['reportto'];
    $sci = $_POST['cs'];
    $time = gmdate("H:i:s", time()+7*3600);
	$data['redate'] = date("d/m/Y $time");
    $data1['date'] = date("d/m/Y $time");
    $data1['accountname'] = 0;
    $data1['actiondetail'] = 1;
    $data1['too'] = str_replace("'","\'",trim($_POST['email']));
    $data['hide'] = 1;
    $sx = $h->query("select max(sort) as maxsx from teacher where school_id=".$data['school_id']);
    $rx = $h->fetch_array($sx);
    $data['sort'] = $rx['maxsx'] + 1;
    /*if($_FILES['img']['name']!='') {
        if($_FILES["img"]["type"]=='image/jpeg' || $_FILES["img"]["type"]=='image/gif' || $_FILES["img"]["type"]=='image/png' || $_FILES['img']['type']=='image/jpg') {
            	$path = "../upload/teacher";
	
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
	
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
	
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
	
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
	
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".time().'-'.$_FILES['img']['name']);
        }
        $data['img'] = time().'-'.$_FILES['img']['name'];
    }
    $stc = $h->query("select id from teacher where teacher_id='".$data['teacher_id']."'");
    $ntc = $h->num_rows($stc);
    if($ntc) echo '3';
    else {*/
        $ss = $h->query("select id from teacher where email='".$data['email']."'");
        $ns = $h->num_rows($ss);
        if($ns) echo '2';
        else {
            $s = $h->insert($data,"teacher");
            $slog = $h->insert($data1,"log");
            $sht = $h->query("select id,fname,mname from teacher where level=1 and school_id=$sci and hide=1 order by sort asc,id asc");
            $msg = "";
            while($rht = $h->fetch_array($sht)){
                $idht = $rht['id'];
                if($lang == 'vn')
                    $tengvht = $rht['fname'].' '.$rht['mname'];
                else
                    $tengvht = change($rht['fname'].' '.$rht['mname']);
                    if($rht['id']==$id && $rht['id']!=$data['reportto'])
                        $msg .= '<li class="act"><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a><a class="delgv" rel="'.$rht['id'].'">&nbsp;</a>';
                    elseif($rht['id']!=$id && $rht['id']!=$data['reportto'])
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a><a class="delgv" rel="'.$rht['id'].'">&nbsp;</a>';
                    elseif($rht['id']!=$id && $rht['id']==$data['reportto'])
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="1"><img src="img/down_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a><a class="delgv" rel="'.$rht['id'].'">&nbsp;</a>';
                    else
                        $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a><a class="delgv" rel="'.$rht['id'].'">&nbsp;</a>';
                    $sgv = $h->query("select id,fname,mname from teacher where level=2 and school_id=$sci and hide=1 and reportto=$idht order by sort,id");
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
                                $msg .= '<li class="act"><a class="xemgv" rel="'.$rgv['id'].'">'.$tengv.'</a><a class="delgv" rel="'.$rgv['id'].'">&nbsp;</a></li>';
                            else
                                $msg .= '<li><a class="xemgv" rel="'.$rgv['id'].'">'.$tengv.'</a><a class="delgv" rel="'.$rgv['id'].'">&nbsp;</a></li>';
                        }
                        $msg .= '</ul>';
                    }
                $msg .= '</li>';
            }
            echo "1;;;".$msg;
        }
    #}
    
?>