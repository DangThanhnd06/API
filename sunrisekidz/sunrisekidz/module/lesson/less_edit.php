<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select pr_id,name_vn,name_en,thang from monhoc where id=$id");
    $r = $h->fetch_array($s);
    $pr_id = $r['pr_id'];
    $nv = $r['name_vn'];
    $ne = $r['name_en'];
    $thang = $r['thang'];
    /*$ss = $h->query("select clg from practise where id=$pr_id");
    $rs = $h->fetch_array($ss);
    $age = $rs['age'];*/
?>
                            <div>
                                <input type="hidden" id="idles" value="<?=$id?>" />
                                <label for="class_gr"><?=_lessname?> (VN)</label>
                                <input class="in" id="name_vnle" name="name_vnle" value="<?=$nv?>" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (EN)</label>
                                <input class="in" id="name_enle" name="name_enle" value="<?=$ne?>" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_month?></label>
                                <select id="lessthange" name="lessthange">
                                <?php
                                    $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                    foreach($mthang as $kth=>$vth){
                                        if($vth == $thang)
                                            echo '<option value="'.$kth.'" selected>'.$vth.'</option>';
                                        else
                                            echo '<option value="'.$kth.'">'.$vth.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" class="gui" id="sendedle" value="<?=_update?>" />
                            </div>