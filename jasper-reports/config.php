<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Jasper Reports Plugin for osTicket 1.9.x
 *
 * @author meatballcoder on github
 */

require_once(INCLUDE_DIR.'class.plugin.php');
require_once(INCLUDE_DIR.'class.forms.php');
require_once(INCLUDE_DIR.'class.config.php');

class JasperReportsConfig extends PluginConfig{
    function getOptions() {
 
        $form_choices = array('0' => '--None--');
        foreach (DynamicForm::objects()->filter(array('type'=>'G')) as $group)
        {
            $form_choices[$group->get('id')] = $group->get('title');
        }
        return array(
            'url_jasper_server' => new TextboxField (array(
                'url'    => 'url_jasper_server',
                'label' => 'URL of Jasper Server',
                'configuration' => array(
                    'desc' => 'Full URL of the Jasper Server')                
            )),
            'ssl_jasper_server' => new BooleanField (array(
                'id'    => 'ssl_jasper_server',
                'label' => 'Use SSL?',
                 'configuration' => array(
                    'desc' => 'Use the correct porta in the URL above, i.e. 8443.')  
            )),
                       
    );
   }
    
      // function pre_save(&$config, &$errors) {
        // global $msg;

        // if (!$errors)
            // $msg = 'Configuration updated successfully';

        // return true;
    // }
}
?>