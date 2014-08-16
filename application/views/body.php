<?
/** @var \View $this */
/** @var array $tweets */


?>
<div id="timeline">
	<? foreach($tweets as $tweet): ?>
		<?=$this->renderPartial('tweet',$tweet)?>
	<? endforeach; ?>

</div>