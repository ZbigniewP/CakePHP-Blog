<div class="portlet">
	<div class="portlet-decoration">
		<div class="portlet-title">Tags</div>
	</div>
	<div class="portlet-content">
<?php
//  * // Taxonomy\View\Cell\TagCloudCell::smallList()
//  * $cell = $this->cell('Taxonomy.TagCloud::smallList', ['limit' => 10]);
//  *
//  * // App\View\Cell\TagCloudCell::smallList()
//  * $cell = $this->cell('TagCloud::smallList', ['limit' => 10]);
//  * ```
//  *
//  * The `display` action will be used by default when no action is provided:
//  *
//  * ```
//  * // Taxonomy\View\Cell\TagCloudCell::display()
//  * $cell = $this->cell('Taxonomy.TagCloud');
if (isset($tags) && count($tags)) {
	foreach ($tags as $tag => $weight) {
		// switch ($this->owner->id) {
		// 	case 'cakeposts':
		// 		$link = $this->Html->link(CHtml::encode($tag), array('cakeposts/index', 'tag' => $weight[0]));
		// 		$weight = $weight[1];
		// 		break;
		// 	case 'demopost':
		// 		$link = $this->Html->link(CHtml::encode($tag), array('demopost/index', 'tag' => $tag));
		// 		break;
		// 	case 'comment':
		// 	default:
		// 		$link = $this->Html->link(CHtml::encode($tag), array('post/index', 'tag' => $tag));
		// 		break;
		// }
		$link = $this->Html->link('TAG', ['index', 'tag' => 'xxx']);
		echo '<span class="tag" "style="font-size:{$weight}pt">' . $link . '</span>' . PHP_EOL;
	}
}
$_tagLinks = null;
foreach ($data->getTagLinks() as $key => $value) {
	$_tagLinks .= $this->Html->link($value['label'],$value['url']). ', ';
}
?>
	</div>
</div>