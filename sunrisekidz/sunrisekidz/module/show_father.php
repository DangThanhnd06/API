<?php
    include('../require_inc.php');
    $id = $_POST['id'];
    $ss = $h->query("select father_name,father_number,father_email,father_address,father_img from children where id=$id and hide=1");
    $r = $h->fetch_array($ss);
    if($r['gender']==1) $gender = _male;
    else $gender = _female;
    if($lang == 'vn') $tenc = _name.' '._fathers;
    else $tenc = _fathers.' '._name;
    if($lang == 'vn') $sdtc = _contactnm.' '._fathers;
    else $sdtc = _fathers.' '._contactnm;
    if($lang == 'vn') $emc = 'Email '._fathers;
    else $emc = _fathers.' email';
    if($lang == 'vn') $addc = _address.' '._fathers;
    else $addc = _fathers.' '._address;
?>
<div class="lleft">
    <div class="img">
        <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>
        <?php
            if($r['father_img']!="") {
        ?>
        <div class="anh" id="fathimg"><img src="upload/children/<?=$r['father_img']?>" alt="<?=_father?>" /></div>
        <?php } else { ?>
        <div class="anh" id="fathimg"><img src="img/noimg.png" alt="No image" /></div>
        <?php } ?>
        <div class="editi"><a class="editicrf" rel="<?=$id?>"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>
    </div>
</div>
<div class="rright">
    <input type="hidden" id="idcrrr" value="<?=$id?>" />
    <p><strong><?=$tenc?>: </strong><?php if($lang=='vn') echo $r['father_name']; else echo change($r['father_name']); ?></p>
    <p><strong><?=$sdtc?>: </strong><?php if($lang=='vn') echo $r['father_number']; else echo change($r['father_number']); ?></p>
    <p><strong><?=$emc?>: </strong><?php echo $r['father_email']; ?></p>
    <p><strong><?=$addc?>: </strong><?php if($lang=='vn') echo $r['father_address']; else echo change($r['father_address']); ?></p>
</div>
<p class="clr"></p>
<p class="edittc"><a class="edit_father" rel="<?=$id?>"><?=_edit?></a></p>