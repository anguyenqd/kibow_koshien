<table class="data_list">
	<tr>
		<td>Num</td>
		<td>ID</td>
		<td>Category Name</td>
		<td>Delete</td>
	</tr>
<?php 
$i = 1;
foreach ($categories as $category) {
	?>
	<tr>
		<td><?=$i?></td>
		<td><?=$category['BlogCategory']['category_id']?></td>
		<td><?=$this->Html->link($category['BlogCategory']['category_name'], array('controller' => 'BlogCategories', 'action' => 'edit', $category['BlogCategory']['category_id']))?></td>
		<td><?=$this->Html->link('Delete', array('controller' => 'BlogCategories', 'action' => 'delete', $category['BlogCategory']['category_id']))?></td>
	</tr>
<?$i++;}?>
</table>