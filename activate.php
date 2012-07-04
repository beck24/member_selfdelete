<?php

// set default values if nothing is set
$feedback = elgg_get_plugin_setting('feedback', 'member_selfdelete'); 
if(empty($feedback)){
  elgg_set_plugin_setting('feedback', 'yes', 'member_selfdelete');
}

$method = elgg_get_plugin_setting('method', 'member_selfdelete'); 
if(empty($method)){
  elgg_set_plugin_setting('method', 'delete', 'member_selfdelete');
}