<?php 
// $this->theme='yiiDEMO';
$this->title = 'Blog yii';

$this->start('content');
?>
<div class="container">
	<div class="span-18">
		<div id="content">
			<?= $this->fetch('content'); ?>
		</div><!-- content -->
	</div>

	<div class="span-6 last">
		<div id="sidebar">
		<?php if ($this->request->session()->read('Auth.User')) echo $this->cell('UserMenu'); ?>
		<?= $this->cell('TagCloud') ?>
		<?= $this->cell('RecentComments') ?>

		<div class="portlet">
			<div class="portlet-decoration">
				<div class="portlet-title">Recent Comments</div>
			</div>
			<div class="portlet-content">
				<?php 
				if ($this->request->params['action'] !== 'login'):
				echo $this->cell('Sidebar');
				endif; 
				?>
			</div>
		</div>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->end() ?>

<?= $this->render('/layout/blueprint') ?>