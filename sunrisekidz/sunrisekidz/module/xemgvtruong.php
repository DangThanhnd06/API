<?php
    include("../require_inc.php");
    $sci = $_POST['idt'];
    $_SESSION['idcss'] = $_POST['idt']; 
    $s = $h->query("select tieude from school_brand where id=$sci");
    $r = $h->fetch_array($s);
    $mss = $r["tieude"];
    $sht = $h->query("select id,fname,mname,lname from teacher where level=1 and school_id=$sci and hide=1 order by sort asc,id asc");
    $n = $h->num_rows($sht);
    $ms = "";
    if($n) {
                            while($rht = $h->fetch_array($sht)){
                                $idht = $rht['id'];
                                if($lang == 'vn')
                                    $tengvht = $rht['fname'].' '.$rht['mname'];
                                else
                                    $tengvht = change($rht['fname'].' '.$rht['mname']);
                                $ms .= '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$rht['id'].'">'._ht.' - '.$tengvht.'</a><a class="delgv" rel="'.$rht['id'].'">&nbsp;</a>';
                                $sgv = $h->query("select id,fname,mname,lname from teacher where level=2 and school_id=$sci and hide=1 and reportto=$idht order by sort,id");
                                $n = $h->num_rows($sgv);
                                if($n){
                                    $ms .= '<ul id="'.$idht.'">';
                                    while($rgv = $h->fetch_array($sgv)){
                                        if($langg == 'vn')
                                            $tengv = $rgv['fname'].' '.$rgv['mname'];
                                        else
                                            $tengv = change($rgv['fname'].' '.$rgv['mname']);
                                        $ms .= '<li><a class="xemgv" rel="'.$rgv['id'].'" >'.$tengv.'</a><a class="delgv" rel="'.$rgv['id'].'">&nbsp;</a></li>';
                                    }
                                    $ms .= '</ul>';
                                }
                                $ms .= '</li>';
                            }
} 
    echo $mss.';;;'.$ms;
?>                        