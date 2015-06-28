<?php

defined('_JEXEC') or die("Restricted access");

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');

class GoodsViewGoods extends JViewLegacy{
    
    protected $items; 
    protected $pagination; 

    function display($tpl = null) {
        
        $models = $this->getModel();
        
        $this->items = $models->getItems();
        $this->pagination = $models->getPagination();  
       
        parent::display($tpl); // незабыть вызывать этот метод для отображения шаблона
    }
    
}
