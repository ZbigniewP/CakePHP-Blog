<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
<?php
// echo "<pre>";
// print_r([$data,$comment]);
// echo "</pre>";
// exit();
?>
	<div class="page-header">
		<h1><?= $data->title; ?></h1>
		<p>
			<small>
				Category : 
<?php
foreach (explode(',', $data->tags) as $tag) :
	echo $this->Html->link($tag . ',', ['controller' => 'yii/post', 'action' => 'view', 'tag' => trim($tag)]);
endforeach;
// $this->Html->link($data->category->name, ['controller' => 'Posts', 'action' => 'category', 'slug' => $data->category->slug])
?> by <?= $this->Html->link($data->yii_user->username, ['controller' => 'yii/post', 'action' => 'author', 'id' => $data->yii_user->id]) 
?> on <em><?= date('F jS Y, H:i', $data->update_time) ?></em>
			</small>
		</p>
	</div>

	<article>
		<?= $this->Markdown->parse($data->content) ?>
	</article>

	<hr />

	<section class="comments">

		<h3>Comment this post</h3>

		<?= $this->Form->create($comment) ?>
		<div class="row">
			<div class="col-md-6">
				<?= $this->Form->control('mail', ['class' => 'form-control', 'placeholder' => 'Your email', 'label' => false]) ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Your username', 'label' => false]) ?>
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
		<?= $this->Form->end() ?>

		<?php if ($data->comments): ?>
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

</div>
