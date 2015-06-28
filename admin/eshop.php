<?php

defined('_JEXEC') or die("Restricted access");

JLog::addLogger(
array('text_file' => 'com_eshop.php'),
JLog::ALL,
array('com_eshop')
);


if($controller = JRequest::getVar('controller')){

    require_once(JPATH_COMPONENT_ADMINISTRATOR."/controllers/".$controller.".php");
    $classnme = 'EshopController'.$controller;
    $controller = new $classname();
    
    
}
else {

    // Include dependencies
    jimport('joomla.application.component.controller');
    $controller = JControllerLegacy::getInstance('Eshop');
    
}

$controller->execute(JRequest::getCmd('task'));
$controller->redirect();