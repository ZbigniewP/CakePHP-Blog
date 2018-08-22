<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
	<div class="page-header">
		<h1>Blog Symfony</h1>
		<p class="lead">Welcome on my blog</p>
	</div>
	<?php foreach ($posts as $data): ?>
		<article>
			<h2><?= $this->Html->link($data->title, ['controller' => 'SymfonyBlog', 'action' => 'view', 'slug' => $data->slug]) ?></h2>
			<p>
				<small>
					Category : 
<?php 
foreach($data->tags as $tag):
echo $this->Html->link($tag->tag_id, ['controller' => 'SymfonyBlog', 'action' => 'category', 'slug' => $tag->tag_id]).PHP_EOL;
endforeach;
?>,
					by <?= $this->Html->link($data->author->full_name, ['controller' => 'SymfonyBlog', 'action' => 'author', 'id' => $data->author->id]) ?> 
					on <em><?= $data->published_at->format('F jS Y, H:i') ?></em>
				</small>
			</p>
			<p><?= $this->Markdown->parse($data->summary) ?></p>
			<p class="text-right"><?= $this->Html->link('Read more...', ['controller' => 'SymfonyBlog', 'action' => 'view', 'slug' => $data->slug], ['class' => 'btn btn-primary']) ?></p>
		</article>
		<hr />
	<?php endforeach; ?>

	<?php if ($this->Paginator->total() && $this->Paginator->counter() !== '1 of 1'): ?>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev('«') ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next('»') ?>
			</ul>
		</div>
	<?php endif; ?>
</div>