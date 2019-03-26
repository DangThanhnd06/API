<?php
    include("../require_inc.php");
    $fr = $_POST['fr'];
    $to = $_POST['to'];
    $actd = $_POST['actd'];
    if($fr==0 && $to==0 && $actd==0) $wh = "";
    elseif($actd == 3) $wh = "where fromm='$fr' and too='$to' and actiondetail=$actd";
    else $wh = "where actiondetail=$actd";
                        $sl = $h->query("select *  from log $wh order by id desc");
                        $n = $h->num_rows($sl);
                        if($n) {
                        $i = 0;
                        while($rl = $h->fetch_array($sl)){
                            if($i%2==0) $cl = "even";
                            else $cl = 'odd';
                            if($rl['accountname']==0) $acc = "Admin";
                            else {
                                $st = $h->query("select fname,mname from teacher where id=".$rl['accountname']);
                                $rt = $h->fetch_array($st);
                                if($lang=='vn') $acc = $rt['fname'].' '.$rt['mname'];
                                else $acc = change($rt['fname'].' '.$rt['mname']);
                            }
                            if($rl['actiondetail']==3) {
                                $acd = _edittl;
                                if($rl['fromm']==1){
                                    $f = _headteacher;
                                    $t = _teacher;
                                    $stt = $h->query("select fname,mname from teacher where id=".$rl['forr']);
                                    $rtt = $h->fetch_array($stt);
                                    if($lang=='vn') $accc = $rtt['fname'].' '.$rtt['mname'];
                                    else $accc = change($rtt['fname'].' '.$rtt['mname']);
                                    $fr = $f.': '.$accc;
                                    $tt = $t.': '.$accc;
                                } else {
                                    $f = _teacher;
                                    $t = _headteacher;
                                    $stt = $h->query("select fname,mname from teacher where id=".$rl['forr']);
                                    $rtt = $h->fetch_array($stt);
                                    if($lang=='vn') $accc = $rtt['fname'].' '.$rtt['mname'];
                                    else $accc = change($rtt['fname'].' '.$rtt['mname']);
                                    $fr = $f.': '.$accc;
                                    $tt = $t.': '.$accc;
                                }
                            }
                            if($rl['actiondetail']==1) {
                                $acd = _addnta;
                                $fr = "&nbsp;";
                                $tt = $rl['too'];
                            }
                            if($rl['actiondetail']==2) {
                                $acd = _addffc;   
                                $fr = "&nbsp;";
                                $tt = $rl['too'];
                            }
                            $datee = substr($rl['date'],0,10);
                        
                    ?>
                        <div class="<?=$cl?>">
                            <p class="dmy"><?=$datee?></p>
                            <p class="accountn"><?=$acc?></p>
                            <p class="actdem"><?=$acd?></p>
                            <p class="from"><?=$fr?></p>
                            <p class="to"><?=$tt?></p>
                            <p class="clr"></p>
                        </div>
                    <?php $i++; } } else { echo '<p class="odd" style="color:red;text-align:center;padding:3% 0;">'._nofound.'</p>';} ?>