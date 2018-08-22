<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
<?php if(isset($data)): ?>
	<header class="page-header">
		<h1><?= $data->name; ?></h1>
		<p>
			<small>
				<?php if($data->has('category')): ?>
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
	</header>

	<article>
		<?= $this->Markdown->parse($data->content) ?>
	</article>

	<hr />

	<section class="comments">

		<h3><?=__('Comment this post') ?></h3>

		<?= $this->Form->create($comment); ?>
		<div class="row">
			<div class="col-md-6">
				<?= $this->Form->control('mail', ['class' => 'form-control', 'placeholder' => 'Your email', 'label' => false]) ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Your username', 'label' => false, 'type' => 'text']) ?>
				</div>
			</div>
			<?= $this->Form->control('post_id', ['type' => 'hidden', 'value' => $data->id]) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'Your comment', 'label' => false]) ?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
		<?= $this->Form->end(); ?>

<?php if ($data->has('comments')): ?>
			<h3><?= count($data->comments) ?> Commentaires</h3>
			<?php foreach ($data->comments as $comment): ?>
				<div class="row">
					<div class="col-md-2">
						<img src="http://lorempicsum.com/futurama/100/100/<?= mt_rand(1, 9) ?>" width="100%">
					</div>
					<div class="col-md-10">
						<p><strong><?= $comment->username ?></strong> <?= $comment->created->timeAgoInWords() ?></p>
						<p><?= $this->Markdown->parse($comment->content) ?></p>
					</div>
				</div>
				<hr />
			<?php endforeach; ?>
<?php endif; ?>
	</section>
<?php else : ?>
	<h1><?= $this->Html->link(__d('cake', 'New {0}',$this->name), ['action' => 'add'], ['class' => 'btn btn-primary']) ?></h1>
<?php endif ?>
</div>
