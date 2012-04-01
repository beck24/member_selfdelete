<?php

// set default values if nothing is set
if(empty(elgg_get_plugin_setting('feedback', 'member_selfdelete'))){
  elgg_set_plugin_setting('feedback', 'yes', 'member_selfdelete');
}

if(empty(elgg_get_plugin_setting('method', 'member_selfdelete'))){
  elgg_set_plugin_setting('method', 'delete', 'member_selfdelete');
}