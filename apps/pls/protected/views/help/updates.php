<?php
/**
 * @var HelpController     $this
 * @var SimpleXMLElement[] $updates
 */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('pls', 'Latest Updates');
$this->breadcrumbs = [
	Yii::t('pls', 'Latest Updates'),
];
?>
<h1><?= Yii::t('pls', 'Latest Updates') ?></h1>

<div class="row">
	<?php

	/*
	 	[SUCCESS] replaced foreach with a limited "for" loop.
		Questions:
		* Should this be configured in the library itself, or is it efficient enough to take the entire update feed and truncate it here in the view?
		* If so, should we put the actual value of "5" in a centralized config?
	*/

	$blog_updates = Yii::app()->params['blogUpdates'];

	if (!empty($updates)) {
		for ($i = 0; $i < $blog_updates; $i++) {
			if ($i >= count($updates)) break;
			?>
			<div class="col-md-12 update">
				<h3><a href="<?= $updates[$i]->link ?>" target="_blank"><?= $updates[$i]->title ?></a></h3>
				<p><?= $updates[$i]->description ?></p>
			</div>
			<?php
		}
	}
	else {
		?>
		<?= Yii::t('pls', 'No updates are available at this time.') ?>
		<?php
	}
	?>
</div>