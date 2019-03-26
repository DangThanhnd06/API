<?php
	if(isset($_REQUEST['pqh'])) {
		$pqh = $_REQUEST['pqh'];
		$pqh = rtrim($pqh,"/");
		$mang = explode("/",$pqh);
		switch($mang[0]) {
			case "gioi-thieu":
                if(!isset($mang[1])) $id = 1;
                else{
                    if($mang[1]=='lich-su-hinh-thanh.html') $id=2;
                    if($mang[1]=='tam-nhin-su-menh-gia-tri-muc-tieu.html') $id=3;
                    if($mang[1]=='doi-ngu-giao-vien.html') $id=4;
                    if($mang[1]=='co-so-vat-chat.html') $id=5;
                }
                $s = $h->query("select mota from h_thongtin where id=$id");
                $r = $h->fetch_array($s);
                if($r["mota"] != '')
					$desc = $r["mota"];
				else
				{
					$ss = $h->query("select mota from h_cauhinh");
					$rs = $h->fetch_array($ss);
					$desc = $rs["mota"];
				}
                break;
            case "dich-vu":
                if(!isset($mang[1])) $id = 1;
                else{
                    if($mang[1]=='dao-tao.html') $id=1;
                    if($mang[1]=='tap-huan.html') $id=2;
                    if($mang[1]=='hoi-thao.html') $id=3;
                }
                $s = $h->query("select mota from h_tintuc where id=$id");
                $r = $h->fetch_array($s);
                if($r["mota"] != '')
					$desc = $r["mota"];
				else
				{
					$ss = $h->query("select mota from h_cauhinh");
					$rs = $h->fetch_array($ss);
					$desc = $rs["mota"];
				}
                break;
            case "hoat-dong":
                if(isset($mang[2])){
                    if($mang[1]=='tin-hoat-dong-trung-tam') $tt_id=2;
                    if($mang[1]=='chuong-trinh-hoc') $tt_id=8;
                    if($mang[1]=='hinh-anh') $tt_id=9;
                    if($mang[1]=='clip-lien-ket-youtube') $tt_id=10;
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=$tt_id and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[2]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                    
                }
                break;
            case "cau-chuyen":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=3 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
            case "goc-chuyen-gia":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=4 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
            case "qui-dinh-chinh-sach":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=5 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
            case "uu-dai":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=6 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
            case "cam-ket":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=7 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
            case "thong-tin-tu-van":
                if(isset($mang[1])){
                    $s = $h->query("select tieude,mota from h_tintuc where tt_id=11 and hienthi=1 order by sapxep desc, id desc");
                    while($r = $h->fetch_array($s)){
                        $li = chuoilink($r['tieude']).'.html';
                        if($li == $mang[1]){
                            $mt = $r['mota'];
                            break;
                        }
                    }
                    if($mt != '')
    					$desc = $mt;
    				else
    				{
    					$ss = $h->query("select mota from h_cauhinh");
    					$rs = $h->fetch_array($ss);
    					$desc = $rs["mota"];
    				}
                }
                break;
			default:
				$q = $h->query("select mota from h_cauhinh");
				$r = $h->fetch_array($q);
				$desc = $r["mota"];
				break;
		}
		
	}
	else {
		$q = $h->query("select mota from h_cauhinh");
		$r = $h->fetch_array($q);
		$desc = $r["mota"];
	}
		
	echo $desc;
?>