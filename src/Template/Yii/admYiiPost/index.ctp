<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
	<div class="page-header">
		<h1>Blog Yii</h1>
		<p class="lead">Welcome on my blog</p>
	</div>
	<?php
// , 'slug' => $data->tags
	foreach ($module as $data): 
?>
		<article>
			<h2><?= $this->Html->link($data->title, ['controller' => 'YiiAdmin', 'action' => 'view', 'id' => $data->id]) ?></h2>
			<p>
				<small>
					Category : 
<?php
foreach (explode(',', $data->tags) as $tag) :
	echo $this->Html->link($tag . ',', ['controller' => 'YiiAdmin', 'action' => 'view', 'tag' => trim($tag)]);
endforeach;
?> 
by <?= $this->Html->link($data->user->username, ['controller' => 'YiiAdmin', 'action' => 'author', 'id' => $data->user->id]) 
?> 
on <em><?= date('F jS Y, H:i', $data->update_time) ?></em>
				</small>
			</p>
			<p><?= $this->Markdown->parse($this->Text->truncate($data->content, 450, ['ellipsis' => '...', 'exact' => false])) ?></p>
			<p class="text-right"><?= $this->Html->link('Read more...', ['controller' => 'YiiAdmin', 'action' => 'view', 'id' => $data->id], ['class' => 'btn btn-primary']) ?></p>
		</article>
		<hr />
	<?php endforeach; ?>

	<?php if ($this->Paginator->counter() !== '1 of 1'): ?>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev('«') ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next('»') ?>
			</ul>
		</div>
	<?php endif; ?>
</div>