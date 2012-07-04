<?php
    $form = "";
    
    $form .= elgg_echo('member_selfdelete:explain:'.elgg_get_plugin_setting('method', 'member_selfdelete')) . "<br><br>";
    
    if(elgg_get_plugin_setting('method', 'member_selfdelete') == "choose"){
      $options = array(
        'name' => 'method',
        'value' => $_SESSION['selfdelete']['method'] ? $_SESSION['selfdelete']['method'] : "delete",
        'options' => array(
          elgg_echo('member_selfdelete:explain:anonymize')."<br><br>" => 'anonymize',
          elgg_echo('member_selfdelete:explain:ban')."<br><br>" => 'ban',
          elgg_echo('member_selfdelete:explain:delete')."<br><br>" => 'delete',
        ),
      );
      
      $form .= elgg_view('input/radio', $options);
    }
    
    if(elgg_get_plugin_setting('feedback', 'member_selfdelete') == "yes"){
	  $form .= "<label>" . elgg_echo('member_selfdelete:label:reason') . "</label><br>";
	  $form .= elgg_view('input/longtext', array('name' => 'reason', 'value' => $_SESSION['selfdelete']['reason'])) . "<br><br>";
    }
	
	$form .= "<label>" . sprintf(elgg_echo('member_selfdelete:label:confirmation'), elgg_echo('member_selfdelete:DELETE')) . "<br>";
	$form .= elgg_view('input/text', array('name' => 'confirmation', 'value' => $_SESSION['selfdelete']['confirmation'])) . "<br><br>";
	
	$form .= elgg_view('input/submit', array('value' => elgg_echo('member_selfdelete:submit'))) . " ";
	
	unset($_SESSION['selfdelete']);
echo $form;