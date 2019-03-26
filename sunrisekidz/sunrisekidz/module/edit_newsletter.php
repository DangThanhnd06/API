<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from newsletter where id=$id");
    $r = $h->fetch_array($s);
    $msb = '';
    $mlp = '';
    $mt = '';
    
                                        $scbb = $h->query("select id,tieude from school_brand order by id");
                                        while($rcbb = $h->fetch_array($scbb)){
                                            if($lang == 'vn')
                                                $tr = $rcbb['tieude'];
                                            else
                                                $tr = change($rcbb['tieude']);
                                            if($r['sb_id'] == $rcbb['id'])
                                                $msb .= '<option value="'.$rcbb["id"].'" selected>'.$tr.'</option>';
                                            else
                                                $msb .= '<option value="'.$rcbb["id"].'">'.$tr.'</option>';
                                        }
                                        $scll = $h->query("select tenlop from lop");
                                        while($rcll = $h->fetch_array($scll)){
                                            if($r['lop_id'] == $rcll['tenlop'])
                                                $mlp .= '<option value="'.$rcll['tenlop'].'" selected>'.$rcll['tenlop'].'</option>';
                                            else
                                                $mlp .= '<option value="'.$rcll['tenlop'].'">'.$rcll['tenlop'].'</option>';
                                        }
                                    
                                        $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                        foreach($mthang as $kt=>$vt){
                                            if($kt == $r['thang'])
                                                $mt .= '<option value="'.$kt.'" selected>'.$vt.'</option>';
                                            else
                                                $mt .= '<option value="'.$kt.'">'.$vt.'</option>';
                                        }
                                        $mtdv = $r['tieude_vn'];
                                        $mtde = $r['tieude_en'];
                                        $mndv = $r['noidung_vn'];
                                        $mnde = $r['noidung_en'];
echo $msb.';;;cach;;;'.$mlp.';;;cach;;;'.$mt.';;;cach;;;'.$mtdv.';;;cach;;;'.$mtde.';;;cach;;;'.$mndv.';;;cach;;;'.$mnde;                                        
                                    ?>
