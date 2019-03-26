<div id="menu_left">
    <p class="tieude">&raquo;&nbsp;<a href="../ctrl_panel/?act=update_thongtin&id=1">Cập nhật thông tin giới thiệu</a></p>
    <!--<p class="tieude">&raquo;&nbsp;<a href="../ctrl_panel/?act=thongtin">Quản lý thông tin</a></p>-->
    <p class="tieude">&raquo;&nbsp;<a href="../ctrl_panel/?act=tintuc">Quản lý tin tức</a></p>
    <p class="tieude">&raquo;&nbsp;<a href="../ctrl_panel/?act=donhang">Quản lý đơn hàng</a></p>
    
    <p class="tieude"><a href="../ctrl_panel/?act=logout">Thoát</a></p>
</div>
<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
<!--//---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	//slides the element with class "menu_body" when mouse is over the paragraph
	$("p.tungmenucon").mouseover(function()
    {
	     $(this).next("div.menu_body").slideDown("slow").siblings("div.menu_body").slideUp("slow");
	});
	$("div.menu_body a").mouseover(function()
    {
	     $(this).next("p.menu_conn").slideDown("slow").siblings("p.menu_conn").slideUp("slow");
	});
});
</script>