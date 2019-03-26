<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select tieude_vn,tieude_en from school_brand where id=$id");
    $r = $h->fetch_array($s);
?>
<div>
    <input type="hidden" id="escid" value="<?=$id?>" />
    <label for="class_gr"><?=_tenchinhanh?> (VN)</label>
    <input class="in" id="namesc_vne" name="namesc_vne" value="<?=$r['tieude_vn']?>" />
</div>
<div>
    <label for="class_gr"><?=_tenchinhanh?> (EN)</label>
    <input class="in" id="namesc_ene" name="namesc_ene" value="<?=$r['tieude_en']?>" />
</div>
<div>
    <input type="button" class="gui" id="sendedsc" value="<?=_update?>" />
</div>