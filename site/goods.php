<?php

defined('_JEXEC') or die("Restricted access");

JLog::addLogger(
array('text_file' => 'com_goods.php'),
JLog::ALL,
array('com_goods')
);


if($controller = JRequest::getVar('controller')){

    require_once(JPATH_COMPONENT_ADMINISTRATOR."/controllers/".$controller.".php");
    $classnme = 'GoodsController'.$controller;
    $controller = new $classname();
    
}
else {

    // Include dependencies
    jimport('joomla.application.component.controller');
    $controller = JControllerLegacy::getInstance('goods');
}

$controller->execute(JRequest::getCmd('task'));
$controller->redirect();