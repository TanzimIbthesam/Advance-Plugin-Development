<div class="wrap">
<h1>Pluginad Plugin</h1>
<?php settings_errors();?>
<form method="post" action="options.php">
<?php 
settings_fields('pluginad_options_group');
do_settings_sections('pluginad_plugin');
submit_button();
?>
</form>
</div>

