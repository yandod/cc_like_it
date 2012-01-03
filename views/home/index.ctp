<html>
	<body style="background: transparent; padding:0; margin:0 ">
<table>
	<tr>
		<td style="border-collapse: collapse; display: table-cell; border:1px solid #CAD4E7; background-color: #ECEEF5; padding: 4px 5px; -webkit-border-radius:3px;">
<?php
$url = Router::url(array(
	'plugin' => 'cc_like_it',
	'controller' => 'home',
	'action' => 'like',
	'issue_id' => $this->params['named']['issue_id']
));
?>
			<a href="<?php echo $url;?>" style="font-size:12px">
<?php echo $html->image('/cc_like_it/img/thumb_up.png'); ?>
<?php echo __('Like')?>
			</a>
		</td>
		<td style="border-collapse: collapse; display: table-cell; border:1px solid #CAD4E7; background-color: #FFFFFF; padding: 4px 5px; -webkit-border-radius:3px;">
<span style="font-size:12px"><?php echo $count;?></span>
		</td>
	</tr>
</table>
	</body>
</html>
