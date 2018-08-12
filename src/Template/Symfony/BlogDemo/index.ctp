<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
	<div class="page-header">
		<h1>Blog Symfony</h1>
		<p class="lead">Welcome on my blog</p>
	</div>
	<?php 
	foreach ($dataPost as $data): ?>
		<article>
			<h2><?= $this->Html->link($data->name, ['controller' => 'Posts', 'action' => 'view', 'slug' => $data->slug]) ?></h2>
			<p>
				<small>
					Category : <?= $this->Html->link($data->category->name, ['controller' => 'Posts', 'action' => 'category', 'slug' => $data->category->slug]) ?>,
					by <?= $this->Html->link($data->user->username, ['controller' => 'Posts', 'action' => 'author', 'id' => $data->user->id]) ?> on <em><?= $data->created->format('F jS Y, H:i') ?></em>
				</small>
			</p>
			<p><?php
			// echo $this->Text->truncate($data->content, 450, ['ellipsis' => '...', 'exact' => false]);
			echo $this->Markdown->parse($this->Text->truncate($data->content, 450, ['ellipsis' => '...', 'exact' => false])) 
			?></p>
			<p class="text-right"><?= $this->Html->link('Read more...', ['controller' => 'Posts', 'action' => 'view', 'slug' => $data->slug], ['class' => 'btn btn-primary']) ?></p>
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