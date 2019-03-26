<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $data['level'] = $_POST['level'];
    $data['reportto'] = $_POST['reportto'];
    
    // write to log
    $sl = $h->query("select level from teacher where id=$id");
    $rl = $h->fetch_array($sl);
    $leva = $rl['level'];
    if($leva != $data['level']) {
        if($data['level']==1) {
            $data2['fromm'] = "2";
            $data2['too'] = "1";    
        } else {
            $data2['fromm'] = "1";
            $data2['too'] = "2";
        }
        $time = gmdate("H:i:s", time()+7*3600);
        $data2['date'] = date("d/m/Y $time");
        $data2['forr'] = $id;
        $data2['accountname'] = 0;
        $data2['actiondetail'] = 3;
        $slog = $h->insert($data2,"log");
    }
    $s = $h->update($data,"teacher"," where id=$id");  
    
    
    $ssc = $h->query("select school_id from teacher where id=$id");
    $rsc = $h->fetch_array($ssc);
    $sci = $rsc['school_id'];
    $sht = $h->query("select id,fname,mname,lname from teacher where level=1 and school_id=$sci and hide=1 order by sort asc,id asc");
    $msg = "";
    while($rht = $h->fetch_array($sht)){
        $idht = $rht['id'];
        if($lang == 'vn')
            $tengvht = $rht['fname'].' '.$rht['mname'];
        else
            $tengvht = change($rht['fname'].' '.$rht['mname']);
            if($rht['id']==$id && $rht['id']!=$data['reportto'])
                $msg .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="act xemgv" rel="'.$idht.'">'._ht.' - '.$tengvht.'</a>';
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
    if($data['reportto']==0) $rp = _principle;
    else {
        $sr = $h->query("select fname,mname,lname from teacher where id=".$data['reportto']);
        $rr = $h->fetch_array($sr);
        if($lang=='vn')
            $rp = $rr['lname'].' '.$rr['mname'];
        else
            $rp = change($rr['fname'].' '.$rr['mname']);
    }
    if($data['level']==1) $levv = _headteacher;
    else $levv = _teacher;
    echo $msg."level;;level".$rp."level;;level".$levv;
?>