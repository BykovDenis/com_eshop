<?php

defined('_JEXEC') or die("Restricted access");

jimport('joomla.application.component.controlleradmin');

class EshopControllerGoods extends JControllerAdmin {
    
       
    public function getModel($name = 'Eshop', $prefix = 'EshopModel', $config = array('ignore_request'=> true)) {       
        
        $model = parent::getModel($name, $prefix, $config);        
        return $model;
        
    }
    
}

