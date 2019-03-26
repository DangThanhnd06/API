<?php
    include("../require_inc.php");
    $sl = $h->query("select *  from log where actiondetail IN (40,41,42) order by id desc");
    $n = $h->num_rows($sl);
    if($n) {
    $i = 0;
    while($rl = $h->fetch_array($sl)){
        if($i%2==0) $cl = "even";
        else $cl = 'odd';
        $acc = $rl['too'];
        if($rl['actiondetail'] == 40){
            $acd = _notexistu;
            $fr = '';
            $tt = '';
        }
        if($rl['actiondetail'] == 41){
            $acd = _notrightpass;
            $fr = '';
            $tt = '';
        }
        if($rl['actiondetail'] == 42){
            $acd = _loginsucc;
            $fr = '';
            $tt = '';
        }
        $datee = $rl['date'];
    
?>
    <div class="<?=$cl?>">
        <p class="dmy"><?=$datee?></p>
        <p class="accountn"><?=$acc?></p>
        <p class="actdem"><?=$acd?></p>
        <p class="from"><?=$fr?></p>
        <p class="to"><?=$tt?></p>
        <p class="clr"></p>
    </div>
<?php $i++; } } else echo '<p class="odd" style="color:red;text-align:center;padding:3% 0;">'._nofound.'</p>'; ?>