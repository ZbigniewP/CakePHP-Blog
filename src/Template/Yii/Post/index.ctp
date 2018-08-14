<?php if (!empty($_GET['tag'])) : ?>
<h1>Posts Tagged with <i><?= h($_GET['tag']) ?></i></h1>
<?php endif; ?>

<?php 
// $this_widget('zii.widgets.CListView', ['dataProvider' => $dataProvider,'itemView' => '_view','template' => "{items}\n{pager}"]);

foreach ($dataProvider as $data) {
	include('_view.ctp');
// $this->render('_view');
// echo "<pre>";
// print_r($data->getTagLinks());
// echo "</pre>";
// exit();
}
?>