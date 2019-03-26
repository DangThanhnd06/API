<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from children where id=$id");
    $r =  $h->fetch_array($s);

    if($lang == 'vn') $tenc = _name.' '._mothers;
    else $tenc = _mothers.' '._name;
    if($lang == 'vn') $sdtc = _contactnm.' '._mothers;
    else $sdtc = _mothers.' '._contactnm;
    if($lang == 'vn') $emc = 'Email '._mothers;
    else $emc = _mothers.' email';
    if($lang == 'vn') $addc = _address.' '._mothers;
    else $addc = _mothers.' '._address;
    if($lang == 'vn') $imgc = _image.' '._mothers;
    else $imgc = _mothers.' '._image;
?>
                    <div>
                        <input type="hidden" name="id_editm" value="<?=$id?>" />
                        <label for="email"><?=$tenc?></label>
                        <input type="text" name="mother_namee" id="mother_namee" class="in" value="<?=$r['mother_name']?>" />
                        <div id="suggestmother">
                        </div>
                    </div>
                    <div>
                        <label for="cfemail"><?=$sdtc?></label>
                        <input type="text" name="mother_numbere" id="mother_numbere" class="in" value="<?=$r['mother_number']?>" />
                    </div>
                    <div>
                        <label for="email"><?=$emc?></label>
                        <input type="text" name="mother_emaile" id="mother_emaile" class="in" value="<?=$r['mother_email']?>" />
                    </div>
                    <div>
                        <label for="address"><?=$addc?></label>
                        <input type="text" name="mother_addresse" id="mother_addresse" class="in" value="<?=$r['mother_address']?>" />
                    </div>
                    <div>
                        <label for="img"><?=$imgc?></label>
                        <div class="upload">
                        <?php
                            if($r['mother_img']!="") {
                        ?>
                            <img src="upload/children/<?=$r['mother_img']?>" alt="" width="100" style="margin-bottom: 10px;" /><br />
                        <?php } else { ?>
                            <img src="img/noimg.png" alt="" width="100" style="margin-bottom: 10px;" /><br />
                        <?php } ?>
                            <input type="file" name="img6" id="file-9" class="inputfile inputfile-1" />
    				        <label for="file-9" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div><label>&nbsp;</label><a class="changepm" rel="<?=$id?>"><?=_changepass?></a></div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="guieditm" value="<?=_update?>" />
                    </div>