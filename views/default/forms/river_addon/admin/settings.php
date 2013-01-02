<?php
/**
 * River Addon settings
 * 
 */

	$plugin = elgg_get_plugin_from_id('river_addon');

	// set default values
	if (!isset($plugin->show_thewire)) {
		$plugin->show_thewire = 'no';
	}
	if (!isset($plugin->show_icon)) {
		$plugin->show_icon = 'sidebar';
	}
	if (!isset($plugin->show_menu)) {
		$plugin->show_menu = 'sidebar';
	}
	if (!isset($plugin->show_latest_members)) {
		$plugin->show_latest_members = 'sidebar_alt';
	}
	if (!isset($plugin->show_comments)) {
		$plugin->show_comments = 'sidebar_alt';
	}
	if (!isset($plugin->tab_order)) {
		$plugin->tab_order = 'default';
	}
	if (!isset($plugin->show_friends)) {
		$plugin->show_friends = 'sidebar_alt';
	}
	if (!isset($plugin->show_friends_online)) {
		$plugin->show_friends_online = 'sidebar_alt';
	}
	if (!isset($plugin->num_friends)) {
		$plugin->num_friends = 12;
	}
	if (!isset($plugin->show_ticker)) {
		$plugin->show_ticker = 'sidebar';
	}
	if (!isset($plugin->tweetcount)) {
		$plugin->tweetcount = '4';
	}
	if (!isset($plugin->show_latest_groups)) {
		$plugin->show_latest_groups = 'sidebar';
	}
	if (!isset($plugin->show_custom)) {
		$plugin->show_custom = 'sidebar_alt';
	}
	if (!isset($plugin->show_groups)) {
		$plugin->show_groups = 'sidebar';
	}
	if (!isset($plugin->show_tagcloud)) {
		$plugin->show_tagcloud = 'sidebar_alt';
	}
	if (!isset($plugin->show_albums)) {
		$plugin->show_albums = 'no';
	}
	$new = 11;
	if (!isset($plugin->neworder) || empty($plugin->neworder) || !preg_match('/(^|,)'. $new .'($|,)/', $plugin->neworder)) {
		$plugin->neworder = '1,2,3,4,5,6,7,8,9,10,11,0';
	}



echo "<div class=\"label\">" . elgg_echo('river_addon:header:general') . "</div>";

echo '<div>';
echo elgg_echo('river_addon:label:taborder');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[tab_order]',
	'options_values' => array(
		'default' => elgg_echo('river_addon:option:default'),
		'friend_order' => elgg_echo('river_addon:option:friend'),
		'mine_order' => elgg_echo('river_addon:option:mine')
	),
	'value' => $plugin->tab_order,
));
echo '</div>';

echo "<div class=\"label\">" . elgg_echo('river_addon:header:appearance') . "</div>";
echo "<div>" . elgg_echo('river_addon:info:columns') . "</div>";

$menu = elgg_get_config('menus');
$menu = $menu['site'];

$selected = $plugin->three_column_context;
$selected = explode(",", $selected);

echo '<div>';
echo elgg_echo('river_addon:label:columns');
echo '<select id="select-context" class="elgg-input-select" multiple="multiple">';
foreach ($menu as $item) {
	if (in_array($item->getName(), $selected)) {
		echo "<option selected=\"selected\" value=\"{$item->getName()}\">" . $item->getText() . "</option>";
	} else {
		echo "<option value=\"{$item->getName()}\">" . $item->getText() . "</option>";
	}		
}
echo '</select>';
echo '</div>';

echo "<div class=\"no\" id=\"target\"></div>";

echo '<div>';
echo elgg_echo('river_addon:label:thewire');
echo ' ';
echo elgg_view('input/dropdown', array(
	'name' => 'params[show_thewire]',
	'options_values' => array(
		'no' => elgg_echo('option:no'),
		'yes' => elgg_echo('option:yes')
	),
	'value' => $plugin->show_thewire
));
echo '</div>';

echo "<div class=\"label\">" . elgg_echo('river_addon:header:sidebar') . "</div>";
echo "<div>" . elgg_echo('river_addon:info:modules') . "</div>";

echo '<div class="elgg-modules">';		
	$modules = elgg_view('admin/settings/river_addon/modules');
	echo $modules;
echo "</div>";

echo "<div>" . elgg_echo('river_addon:info:groups') . "</div>";

echo elgg_view('input/submit', array('value' => elgg_echo("save")));

