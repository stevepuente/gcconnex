<?php
/**
 * Group activity widget settings
 */
$widget = $vars["entity"];
$widgetId = $widget->getGUID();
// once autocomplete is working use that
$groups = elgg_get_logged_in_user_entity()->getGroups(array('limit' => 0));
$mygroups = array();
if (!$vars['entity']->group_guid) {
	$mygroups[0] = '';
}
foreach ($groups as $group) {
	$mygroups[$group->guid] = $group->name;
}
$params = array(
	'name' => 'params[group_guid]',
	'value' => $vars['entity']->group_guid,
	'options_values' => $mygroups,
    'id'=> 'params[group_guid]',
);
$group_dropdown = elgg_view('input/select', $params);
?>
<div>
    <?php echo '<label for="params[group_guid]">'.elgg_echo('groups:widget:group_activity:edit:select').'</label>'; ?>:
	<?php echo $group_dropdown; ?>
</div>
<?php

// set default value for number to display
if (!isset($vars['entity']->num_display)) {
	$vars['entity']->num_display = 8;
}

$params = array(
	'name' => 'params[num_display]',
	'value' => $vars['entity']->num_display,
	'options' => array(5, 8, 10, 12, 15, 20),
    'id' => 'params[num_display]',
);
$num_dropdown = elgg_view('input/select', $params);

?>
<div>
    <?php echo '<label for="params[num_display]">'.elgg_echo('widget:numbertodisplay') .'</label>'; ?>:
	<?php echo $num_dropdown; ?>
</div>

<?php

$title_input = elgg_view('input/hidden', array('name' => 'title'));
echo $title_input;
