<div class="portlet"><div class="portlet-decoration">
	<div class="portlet-title">Recent Comments</div>
	<div class="portlet-content">
		<ul>
		<?php 
		foreach($this->getRecentComments() as $comment): 
			?>
		<li><?php 
		echo $comment->authorLink; ?> on
			<?php 
			if(isset($comment->post->title)) echo $this->Html->link(CHtml::encode($comment->post->title), $comment->getUrl());
			else echo $this->Html->link(CHtml::encode($comment->post->name), $comment->getUrl()); 
			?>
		</li>
		<?php 
		endforeach; 
		?>
		</ul>
	</div>
</div></div>