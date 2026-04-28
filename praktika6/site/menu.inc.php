<?php
$menu = [
	"home" => "index.php?id=home",
	"page1" => "index.php?id=page1",
	"page2" => "index.php?id=page2",
	"page3" => "index.php?id=page3",
	"table" => "index.php?id=table"
];
?>	
<table width="100%">
	<tr>
		<td>
			<p>Меню</p>
			<?php
			getMenu($menu );
			?>
		</td>
	</tr>
</table>