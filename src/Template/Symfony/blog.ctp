<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
	<div class="page-header">
		<h1>Blog Symfony</h1>
		<p class="lead">Welcome on my blog</p>
	</div>
	<?php 
	// echo'<pre>';print_r([__FILE__,$blogdemo]);exit;
	foreach ($blogdemo as $post): 
	?>
		<article>
			<h2><?php
			echo $this->Html->link($post->name, ['controller' => 'blogdemo', 'action' => 'view', 'slug' => $post->slug]) 
			?></h2>
			<p>
				<small>
					Category : <?= $this->Html->link($post->category->name, 
					['controller' => 'blogdemo', 'action' => 'category', 'slug' => $post->category->slug]) ?>,
					by <?= $this->Html->link($post->user->username, 
					['controller' => 'blogdemo', 'action' => 'author', 'id' => $post->user->id]) ?> 
					on <em><?= $post->created->format('F jS Y, H:i') ?></em>
				</small>
			</p>
			<p><?php
			// echo $this->Text->truncate($post->content, 450, ['ellipsis' => '...', 'exact' => false]);
			echo $this->Markdown->parse($this->Text->truncate($post->content, 450, ['ellipsis' => '...', 'exact' => false])) 
			?></p>
			<p class="text-right"><?= 
			$this->Html->link('Read more...', 
			['controller' => 'blogdemo', 'action' => 'view', 'slug' => $post->slug], 
			['class' => 'btn btn-primary']) 
			?></p>
		</article>
		<hr />
	<?php endforeach; ?>

	<?php 
	if ($this->Paginator->counter() !== '1 of 1'): 
	// if ($this->Paginator->last()>1): 
		?>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev('«') ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next('»') ?>
			</ul>
		</div>
	<?php endif; ?>
</div>