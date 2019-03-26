<?php
    include("../../require_inc.php");
    $id = explode(";;,;;",$_POST['id']);
    $idd = $id[0];
    $tenlop = $id[1];
?>
<div>
    <input type="hidden" id="idtenlop" value="<?=$idd?>" />
    <label for="class_gr"><?=_tenlop?></label>
    <input class="in" id="etenlop" name="etenlop" value="<?=$tenlop?>" />
</div>
<div>
    <input type="button" class="gui" id="sendedclass" value="<?=_update?>" />
</div>