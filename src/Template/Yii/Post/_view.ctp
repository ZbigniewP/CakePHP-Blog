<div class="post">
	<div class="title">
		<?= $this->Html->link($data->title, $data->getUrl()) ?>
	</div>
	<div class="author">
		posted by <?= $data->yii_user->username . ' on ' . (isset($data->publishedAt) ? $data->publishedAt : date('F j, Y', $data->create_time))?>
	</div>
	<div class="content">
<?php

// print_r($_GET['title']);
// $this->beginWidget('CMarkdown', array('purifyOutput' => true));
// echo isset($_GET['title']) ? $data->content : (isset($data->summary) ? $data->summary : $data->content);
// $this->endWidget();
echo $this->Markdown->parse($this->Text->truncate($data->content, 450, ['ellipsis' => '...', 'exact' => false]));
// implode(', ', $data->tagLinks) 
$_tagLinks = null;
foreach ($data->getTagLinks() as $key => $value) {
	$_tagLinks .= $this->Html->link($value['label'], $value['url']) . ', ';
}
?>
	</div>
	<div class="nav">
		<b>Tags:</b>
		<?= $_tagLinks ?>
		<br />
		<?= $this->Html->link('Permalink', $data->getUrl()) ?> |
		<?= $this->Html->link("Comments ({$data->commentCount})", $data->url . '#comments') ?> |
		Last updated on <?= date('F j, Y', $data->update_time) ?>
	</div>
</div>