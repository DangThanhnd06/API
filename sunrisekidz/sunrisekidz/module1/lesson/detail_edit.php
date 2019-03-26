<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select detail_vn,detail_en,ngaythang from lessons where id=$id");
    $r = $h->fetch_array($s);
?>
<div>
                                <input type="hidden" id="lesside" value="<?=$id?>" />
                                <label for="class_gr"><?=_lessdetail?> (VN)</label>
                                <textarea id="detail_vne"><?=$r['detail_vn']?></textarea>
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessdetail?> (EN)</label>
                                <textarea id="detail_ene"><?=$r['detail_en']?></textarea>
                            </div>
                            <div>
                                <label for="ngaythang"><?=_ngaythang?></label>
                                <input type="text" id="ngaynde" value="<?=$r['ngaythang']?>" placeholder="yyyy-mm-dd" class="in" />
                            </div>
                            <div>
                                <input type="button" class="gui" id="sendedcont" value="<?=_update?>" />
                            </div>
<link rel="stylesheet" href="../../js/jquery.datetimepicker.css" />
<script type="text/javascript" src="../../js/jquery.datetimepicker.js"></script>                
<script type="text/javascript">
    jQuery('#ngaynde').datetimepicker({
         lang:'vn',
         i18n:{
          vn:{
           months:[
            'Jan','Feb','Mar','Apr',
            'May','Jun','Jul','Aug',
            'Sep','Oct','Nov','Dec',
           ],
           dayOfWeek:[
            "Su", "Mo", "Tu", "We", 
            "Th", "Fr", "Sa",
           ]
          }
         },
         timepicker:false,
         format:'Y-m-d'
        });
</script>                            