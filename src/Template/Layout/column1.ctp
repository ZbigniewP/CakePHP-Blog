<?php 
$this->start('content');
?>
<div class="container">
	<div id="content">
		<?= $this->fetch('content'); ?>
	</div><!-- content -->
</div>
<?php
$this->end();
echo $this->render('/layout/main'); 
?>