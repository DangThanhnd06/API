<?php
    include("../../require_inc.php");
    $id = $_POST['id_editf'];
    $sp = $h->query("select password_f from children where id=$id");
    $rp = $h->fetch_array($sp);
    if($rp['password_f']=='' && $_SESSION['passwordf']!="") {
        $data['password_f'] = $_SESSION['passwordf'];    
    } elseif($rp['password_f']=='' && $_SESSION['passwordf']=="") {
        $p = "123456";
        $data['password_f'] = mahoa($p);
    } elseif($rp['password_f']!='' && $_SESSION['passwordf']!="") {
        $data['password_f'] = $rp['password_f'];
    } else $data['password_f'] = $rp['password_f'];
    
    // father
    $data['father_name'] = str_replace("'","\'",trim($_POST['father_namee']));
    $data['father_number'] = str_replace("'","\'",trim($_POST['father_numbere']));
    $data['father_email'] = str_replace("'","\'",trim($_POST['father_emaile']));
    $data['father_address'] = str_replace("'","\'",trim($_POST['father_addresse']));
    if($_FILES['img5']['name']!='') {
        if($_FILES["img5"]["type"]=='image/jpeg' || $_FILES["img5"]["type"]=='image/gif' || $_FILES["img5"]["type"]=='image/png' || $_FILES['img5']['type']=='image/jpg') {
            	$path = "../../upload/children";
	
				$file_tmp = isset($_FILES['img5']['tmp_name']) ? $_FILES['img5']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img5']['name']) ? $_FILES['img5']['name'] : "";
	
				$file_type = isset($_FILES['img5']['type']) ? $_FILES['img5']['type'] : "";
	
				$file_size = isset($_FILES['img5']['size']) ? $_FILES['img5']['size'] : "";
	
				$file_error = isset($_FILES['img5']['error']) ? $_FILES['img5']['error'] : "";
	
				move_uploaded_file($_FILES['img5']['tmp_name'],$path."/".$id.'-'.$_FILES['img5']['name']);
        }
        $data['father_img'] = $id.'-'.$_FILES['img5']['name'];
    } else $data['father_img'] = $_SESSION['fatherimg'];
    $ss = $h->update($data,"children"," where id=$id");
    $sc = $h->query("select father_name,father_number,father_email,father_address,father_img from children where id=$id and hide=1");
    $r = $h->fetch_array($sc);
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