<p class="title">Cập nhật nội dung html</p>
			<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%">
			  <tr>
				<td align="center" nowrap class="title">STT.</td>
				<td nowrap class="title" align="center">Sửa</td>
				<td align="center" nowrap class="title" width="86%"><b>Tiêu đề</b></td>
			  </tr>
			  <?php
					$result = $h->query("select id,tieude from h_html order by id");
					$i=0;
					while($row=$h->fetch_array($result))
					{
						$i++; 
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";						
			  ?>
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top"><?php echo $i; ?></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<a href="../ctrl_panel/?act=update_html&id=<?php echo $row['id']; ?>" title="Update"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td bgcolor="<?php echo $color?>" class="smallfont" width="86%" valign="top" style="text-align:left;"><?php echo $row['tieude']; ?></td>
			  </tr>
			  <?php
					} 
			  ?>
			</table>