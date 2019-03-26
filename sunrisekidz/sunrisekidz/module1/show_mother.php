<?php
    include('../require_inc.php');
    $id = $_POST['id'];
    $ss = $h->query("select mother_name,mother_number,mother_email,mother_address,mother_img from children where id=$id");
    $r = $h->fetch_array($ss);
    if($r['gender']==1) $gender = _male;
    else $gender = _female;
    if($lang == 'vn') $tenc = _name.' '._mothers;
    else $tenc = _mothers.' '._name;
    if($lang == 'vn') $sdtc = _contactnm.' '._mothers;
    else $sdtc = _mothers.' '._contactnm;
    if($lang == 'vn') $emc = 'Email '._mothers;
    else $emc = _mothers.' email';
    if($lang == 'vn') $addc = _address.' '._mothers;
    else $addc = _mothers.' '._address;
?>
<div class="lleft">
    <div class="img">
        <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>
        <?php
            if($r['mother_img']!="") {
        ?>
        <div class="anh" id="mothimg"><img src="upload/children/<?=$r['mother_img']?>" alt="<?=_mother?>" /></div>
        <?php } else { ?>
        <div class="anh" id="mothimg"><img src="img/noimg.png" alt="HS" /></div>
        <?php } ?>
        <div class="editi"><a class="editicrm" rel="<?=$id?>"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>
    </div>
</div>
<div class="rright">
    <p><strong><?=$tenc?>: </strong><?php if($lang=='vn') echo $r['mother_name']; else echo change($r['mother_name']); ?></p>
    <p><strong><?=$sdtc?>: </strong><?php if($lang=='vn') echo $r['mother_number']; else echo change($r['mother_number']); ?></p>
    <p><strong><?=$emc?>: </strong><?php echo $r['mother_email']; ?></p>
    <p><strong><?=$addc?>: </strong><?php if($lang=='vn') echo $r['mother_address']; else echo change($r['mother_address']); ?></p>
</div>
<p class="clr"></p>
<p class="edittc"><a class="edit_mother" rel="<?=$id?>"><?=_edit?></a></p>