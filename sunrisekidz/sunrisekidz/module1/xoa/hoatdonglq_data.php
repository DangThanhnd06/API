<?php
include("../require_inc.php");
$page = $_REQUEST['page'];
$dulieu = $_REQUEST['dulieu'];
$tt_id = $_REQUEST['tt_id'];
$cur_page = $page;
$page -= 1;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$per_page = 9;
switch($tt_id){
    case 2:
        $lk = 'hoat-dong/tin-hoat-dong-trung-tam/';
        break;
    case 3:
        $lk = 'cau-chuyen/';
        break;
    case 4:
        $lk = 'goc-chuyen-gia/';
        break;
    case 5:
        $lk = 'qui-dinh-chinh-sach/';
        break;
    case 6:
        $lk = 'uu-dai/';
        break;
    case 7:
        $lk = 'cam-ket/';
        break;
    case 8:
        $lk = 'hoat-dong/chuong-trinh-hoc/';
        break;
    case 9:
        $lk = 'hoat-dong/hinh-anh/';
        break;
    case 10:
        $lk = 'hoat-dong/clip-lien-ket-youtube/';
        break;
    case 10:
        $lk = 'thong-tin-tu-van/';
        break;
}
$start = $page * $per_page;
$query_pag_data = "select tieude,hinhanh,xnd,video from h_tintuc where $dulieu order by sapxep desc,id desc  limit $start,$per_page";

$result_pag_data = mysql_query($query_pag_data);
$n = @mysql_num_rows($result_pag_data);
$i = 1;
while ($r = @mysql_fetch_array($result_pag_data)) {
	$link = URL.$lk.chuoilink($r['tieude']).'.html';
    $msg .= '<li><a href="'.$link.'">'.$r['tieude'].'</a></li>';    
}


// Content for Data
/*
    		
*/
$batdau = $start + 1;
//$ketthuc = $limit;
/* --------------------------------------------- */
$query_pag_num = "select id from h_tintuc where $dulieu";
///$query_pag_num = $result_pag_data;
$result_pag_num = mysql_query($query_pag_num);
//echo $result_pag_num;
$count = mysql_num_rows($result_pag_num);
/*$count = $row['count'];
echo $count;*/
$no_of_paginations = ceil($count / $per_page);
//$msg .= $no_of_paginations;
if($count >= ($per_page+1)) {
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
// <div class="pagination"><div class="links"> <b><span>1</span></b>  <a href="http://www.techone.vn/news/?page=2"><span>2</span></a>  <a href="http://www.techone.vn/news/?page=3"><span>3</span></a>  <a href="http://www.techone.vn/news/?page=4"><span>4</span></a>  <a href="http://www.techone.vn/news/?page=5"><span>5</span></a>  ....  <a href="http://www.techone.vn/news/?page=2"><span>Sau »</span></a> <a href="http://www.techone.vn/news/?page=92"><span>Cu?i »</span></a> </div><div class="results">Hi?n th? 1 d?n 20 trong 1837 (92 Trang)</div></div>
$msg .= "<div id='paging_button' align='center'><ul>";

if($cur_page==1) {
	 $msg .= "<li class='deactive'>Trang đầu</li>";
	 $msg .= "<li class='deactive'>Trang trước</li>";
}
// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='mo'>Trang đầu</li>";
} else if ($first_btn) {
    $msg .= "";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='mo'>Trang trước</li>";
} else if ($previous_btn) {
    $msg .= "";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='mo'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='mo'>Trang sau</li>";
} else if ($next_btn) {
    $msg .= "";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='mo'>Trang cuối</li>";
} else if ($last_btn) {
    $msg .= "";
}
if($cur_page == $no_of_paginations) {
	$msg .= "<li class='deactive'>Trang sau</li>";
	$msg .= "<li class='deactive'>Trang cuối</li>";
}

    
$msg .= "</ul></div>";  // Content for pagination
}
echo $msg;

?>