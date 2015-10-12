<?php

namespace Beck24\MemberSelfDelete;

// get our inputs
$offset = get_input('offset', 0);
if($offset < 0){ $offset = 0; }
$limit = get_input('limit', 10);

// get total for pagination
$params = array(
  'annotation_names' => array('selfdeletefeedback'),
  'count' => TRUE,
);
$total = elgg_get_annotations($params);


// generate content
$content = "<br>";

$content .= elgg_view('navigation/pagination',array(
		'base_url' => elgg_get_site_url() . "admin/users/member_selfdelete/reasons",
		'offset' => $offset,
		'count' => $total,
		'limit' => $limit,
	));


$annotations = elgg_get_annotations(array(
  'annotation_names' => array('selfdeletefeedback'),
  'limit' => $limit,
  'offset' => $offset,
  'order_by'  =>  'n_table.time_created desc'
));

if(count($annotations) > 0){
  foreach($annotations as $annotation){
    $content .= "<div style=\"margin: 10px; border: 2px solid black; padding: 10px;\">";
    $content .= "<b>" . date("F j, Y", $annotation->time_created) . "</b><br><br>";
    $content .= $annotation->value;
    $content .= "</div>";
  }
}
else{
   $content .= "No users have deleted their acccounts";  
}

echo $content;