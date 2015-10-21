<?php
function flippenlekka_agents_list () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/flippen-lekka-agents/style-admin.css" rel="stylesheet" />

<div class="wrap">
<h2>Agents</h2>
<a href="<?php echo admin_url('admin.php?page=flippenlekka_agents_create'); ?>">Add New</a><br/><br/>
<?php
global $wpdb;
                                      
$rows = $wpdb->get_results("SELECT name, surname, email, phone from agents");
                                      
echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>Name</th><th>Surname</th><th>&nbsp;</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->name</td>";
	echo "<td>$row->surname</td>";	
    echo "<td>$row->email</td>";	
    echo "<td>$row->phone</td>";	
	echo "<td><a href='".admin_url('admin.php?page=flippenlekka_agents_update&id='.$row->id)."'>Edit Details</a></td>";
	echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}