<?php
    include("../../require_inc.php");
    $id = $_POST['id_editm'];
    $sp = $h->query("select password_m from children where id=$id");
    $rp = $h->fetch_array($sp);
    if($rp['password_m']=='' && $_SESSION['passwordm']!="") {
        $data['password_m'] = $_SESSION['passwordm'];    
    } elseif($rp['password_m']=='' && $_SESSION['passwordm']=="") {
        $p = "123456";
        $data['password_m'] = mahoa($p);
    } elseif($rp['password_m']!='' && $_SESSION['passwordm']!="") {
        $data['password_m'] = $rp['password_m'];
    } else $data['password_m'] = $rp['password_m'];
    // mother
    $data['mother_name'] = str_replace("'","\'",trim($_POST['mother_namee']));
    $data['mother_number'] = str_replace("'","\'",trim($_POST['mother_numbere']));
    $data['mother_email'] = str_replace("'","\'",trim($_POST['mother_emaile']));
    $data['mother_address'] = str_replace("'","\'",trim($_POST['mother_addresse']));
    if($_FILES['img6']['name']!='') {
        if($_FILES["img6"]["type"]=='image/jpeg' || $_FILES["img6"]["type"]=='image/gif' || $_FILES["img6"]["type"]=='image/png' || $_FILES['img6']['type']=='image/jpg') {
            	$path = "../../upload/children";
	
				$file_tmp = isset($_FILES['img6']['tmp_name']) ? $_FILES['img6']['tmp_name'] : "";
	
				$file_name = isset($_FILES['img6']['name']) ? $_FILES['img6']['name'] : "";
	
				$file_type = isset($_FILES['img6']['type']) ? $_FILES['img6']['type'] : "";
	
				$file_size = isset($_FILES['img6']['size']) ? $_FILES['img6']['size'] : "";
	
				$file_error = isset($_FILES['img6']['error']) ? $_FILES['img6']['error'] : "";
	
				move_uploaded_file($_FILES['img6']['tmp_name'],$path."/".$id.'-'.$_FILES['img6']['name']);
        }
        $data['mother_img'] = $id.'-'.$_FILES['img6']['name'];
    } else $data['mother_img'] = $_SESSION['motherimg'];
    $ss = $h->update($data,"children"," where id=$id");
    $sc = $h->query("select mother_name,mother_number,mother_email,mother_address,mother_img from children where id=$id");
    $r = $h->fetch_array($sc);
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
        <div class="anh" id="fathimg"><img src="upload/children/<?=$r['mother_img']?>" alt="<?=_mother?>" /></div>
        <?php } else { ?>
        <div class="anh" id="fathimg"><img src="img/noimg.png" alt="No image" /></div>
        <?php } ?>
        <div class="editi"><a class="editicrf" rel="<?=$id?>"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>
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