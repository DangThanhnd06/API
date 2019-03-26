<?php
    include("../require_inc.php");
    $id = $_REQUEST['id'];
    $s = $h->query("select video from h_tintuc where id=$id");
    $r = $h->fetch_array($s);
    echo '<object class="videogt"><param name="movie" value="http://www.youtube.com/v/'.$r['video'].'?hl=vi_VN&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'.$r['video'].'?hl=vi_VN&amp;version=3" type="application/x-shockwave-flash" class="videogt" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
?>