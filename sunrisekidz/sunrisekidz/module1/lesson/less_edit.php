<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select pr_id,name_vn,name_en from monhoc where id=$id");
    $r = $h->fetch_array($s);
    $pr_id = $r['pr_id'];
    $nv = $r['name_vn'];
    $ne = $r['name_en'];
    $ss = $h->query("select age from practise where id=$pr_id");
    $rs = $h->fetch_array($ss);
    $age = $rs['age'];
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
                                <input type="submit" class="gui" id="sendedle" value="<?=_update?>" />
                            </div>