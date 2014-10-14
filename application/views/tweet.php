<?
/** @var \View $this */
?>
<div class="tweet" id="tweet_<?=$id?>">
	<table cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td class="username">
					<a href="http://twitter.com/SuperMadeAlves" target="_blank">
						<img class="avatar" width="48" height="48" src="<?=$user['avatar']?>" alt="<?=$user['name']?>">
					</a>
				</td>
				<td class="status-body">
					<div class="postinner">
						<p>
							<a class="the-username" href="http://twitter.com/<?=$user['nickname']?>" target="_blank"><?=$user['name']?></a><br/>
							<span class="the-message"><?=$text?></span>
							<? if(isset($photo) && $photo != ''): ?>
								<img class="photo" src="<?=$photo?>">
							<? elseif(isset($media[0])): ?>
						<div class="crop">
							<img src="<?=$media[0]?>" />
						</div>
						<? endif; ?>
						</p>
						<div class="time">
							<a href="" target="_blank"><?=System::getTimeAgo($time)?></a>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>

</div>