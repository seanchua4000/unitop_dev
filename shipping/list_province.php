<?php
require_once 'core/init.php';
$location = Db::getInstance();
$province = $location->query("SELECT * FROM location WHERE parent_id = 0");

foreach($province->results() as $provinces) {
	echo '<li><span class="plus_icon"><input type="hidden" value="'.$provinces->main_id.'"></span>'.$provinces->location.'</li>';
}