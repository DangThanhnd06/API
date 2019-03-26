<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select tieude from school_brand where id=$id");
    $r = $h->fetch_array($s);
?>
<div>
    <input type="hidden" id="escid" value="<?=$id?>" />
    <label for="class_gr"><?=_tenchinhanh?></label>
    <input class="in" id="namesc_vne" name="namesc_vne" value="<?=$r['tieude']?>" />
</div>
<div>
    <input type="button" class="gui" id="sendedsc" value="<?=_update?>" />
</div>