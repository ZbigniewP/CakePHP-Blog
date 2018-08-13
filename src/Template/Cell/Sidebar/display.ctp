<?php 
/** @var \App\View\AppView $this */ ?>
<div class="col-md-4 sidebar">
	<h4>Categories</h4>
	<div class="list-group">
<?php 
foreach ($categories as $category) :
	if (strtolower($this->request->params['controller']) == 'posts')
		echo $this->Html->link("<span class='badge'>{$category->post_count}</span>{$category->name}",
			['controller' => 'Posts', 'action' => 'category', 'slug' => $category->slug],
			['escape' => false, 'class' => 'list-group-item']
		);

	if (strtolower($this->request->params['controller']) == 'yii/post')
		echo $this->Html->link("<span class='badge'>{$category->frequency}</span>{$category->name}",
			['controller' => 'yii/post', 'action' => 'category', 'tag' => $category->name],
			['escape' => false, 'class' => 'list-group-item']
		);

	if (strtolower($this->request->params['controller']) == 'symfonyblog')
		echo $this->Html->link("<span class='badge'>{$category->frequency}</span>{$category->name}",
			['controller' => 'SymfonyBlog', 'action' => 'category', 'slug' => $category->slug],
			['escape' => false, 'class' => 'list-group-item']
		);
endforeach;
?>
	</div>

	<h4>Last posts</h4>
	<div class="list-group">
<?php
foreach ($posts as $post) :
	if (strtolower($this->request->params['controller']) == 'posts')
		echo $this->Html->link($post->name, 
			['controller' => 'Posts', 'action' => 'view', 'slug' => $post->slug], 
			['class' => 'list-group-item']);

	if (strtolower($this->request->params['controller']) == 'yiipost')
		echo $this->Html->link($post->name, 
			['controller' => 'yii/post', 'action' => 'view', 'slug' => $post->slug], 
			['class' => 'list-group-item']);

	if (strtolower($this->request->params['controller']) == 'symfonyblog')
		echo $this->Html->link($post->name, 
			['controller' => 'SymfonyBlog', 'action' => 'view', 'slug' => $post->slug], 
			['class' => 'list-group-item']);
endforeach; 
?>
	</div>
</div>