<?php

defined('_JEXEC') or die("Restricted access");

jimport('joomla.application.component.controlleradmin');


class GoodsControllerGoods extends JControllerAdmin {
    
       
    public function getModel($name = 'Goods', $prefix = 'GoodsModel', $config = array('ignore_request'=> true)) {
        
        $model = parent::getModel($name, $prefix, $config);        
        return $model;
        
    }
    
}

