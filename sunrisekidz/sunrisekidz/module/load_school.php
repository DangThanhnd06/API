<?php 
    include("../require_inc.php");
    $tr = $_POST['tt'];
?>
<option value="0"><?=_chooseschool?></option>
<?php
    $sasc = $h->query("select id,tieude from school_brand order by id asc");
    while($rasc = $h->fetch_array($sasc)){
        if($lang == 'vn') $ttc = $rasc['tieude'];
        else $ttc = change($rasc['tieude']);
        if($ttc==$tr)
            echo '<option value="'.$rasc['id'].'" selected>'._school.' '.$ttc.'</option>';
        else
            echo '<option value="'.$rasc['id'].'">'._school.' '.$ttc.'</option>'; 
    }
?>