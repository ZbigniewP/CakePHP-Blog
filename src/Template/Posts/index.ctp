<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
	<div class="page-header">
		<h1>Blog</h1>
		<p class="lead">Welcome on my blog</p>
	</div>
	<?php foreach ($posts as $data): ?>
		<article>
			<h2><?= $this->Html->link($data->has('title') ? $data->title : $data->name, 
			['controller' => 'Posts', 'action' => 'view', 'slug' => $data->slug]) ?></h2>
			<p>
				<small><?php if($data->has('category')): ?>
					Category : <?= $this->Html->link($data->category->name, 
					['controller' => 'Posts', 'action' => 'category', 'slug' => $data->category->slug]) ?>,
					<?php endif ?>
					<?php if($data->has('user')): ?>
					by <?= $this->Html->link($data->user->username, 
					['controller' => 'Posts', 'action' => 'author', 'id' => $data->user->id]) ?> 
					<?php endif ?>
					on <em><?= $data->created->format('F jS Y, H:i') ?></em>
				</small>
			</p>
			<p><?= $this->Markdown->parse($this->Text->truncate($data->content, 450, ['ellipsis' => '...', 'exact' => false])) ?></p>
			<p class="text-right"><?= $this->Html->link(__('Read more...'),
			['controller' => 'Posts', 'action' => 'view', 'slug' => $data->slug], ['class' => 'btn btn-primary']) ?></p>
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
