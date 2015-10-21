<?php
function flippenlekka_agents_create () {
$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"]; 
$phone = $_POST["phone"];    
//insert
if(isset($_POST['insert'])){
	global $wpdb;
	$wpdb->insert(
		'agents', //table
		array('name' => $name,'surname' => $surname, 'email' => $email,'phone' => $phone), //data
		array('%s','%s') //data format			
	);
	$message.="Agent inserted";
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/flippen-lekka-agents/style-admin.css" rel="stylesheet" />

<div class="wrap">
<h2>Add New Agent</h2>
    
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
    
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<p>Enter Agent details below</p>
<table class='wp-list-table widefat fixed'>
    
<tr><th>Name</th><td><input type="text" name="name" value="<?php echo $name;?>"/></td></tr>
    
<tr><th>Surname</th><td><input type="text" name="surname" value="<?php echo $surname;?>"/></td></tr>
    
<tr><th>Email</th><td><input type="text" name="email" value="<?php echo $email;?>"/></td></tr>
    
<tr><th>Phone</th><td><input type="text" name="phone" value="<?php echo $phone;?>"/></td></tr>
    
</table>
<input type='submit' name="insert" value='Save' class='button'>
</form>
    
</div>
<?php
}