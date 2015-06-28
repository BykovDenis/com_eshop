<?php

defined('_JEXEC') or die("Restricted access");

jimport('joomla.application.component.modellist');
jimport('joomla.libraries.cms.pagination'); 

class GoodsModelGoods extends JModelList{
    
    private $perPage;
    private $limitstart;
    private $pagination;
    
    public function __construct() {  
        $this->_db = JFactory::getDbo();
        parent::__construct();
        
        $this->perPage = 20;
        $this->limitstart = JRequest::getInt('limitstart',0);  
    }    
    
    public function getTable($name = 'Catalog', $prefix = 'Table', $options = array()) {  
        
        parent::getTable($name, $prefix, $options);
    }
     
    public function getTotal() {
        
        $query = $this->_db->getQuery(true);
        $query->select('good_id');
        $query->from('#__catalog');
        $this->_db->setQuery($query);
        $this->_db->query();
        $total= $this->_db->getNumRows();
        
        return $total;        
    }    
    
    public function getItems() {        
       
        $query = $this->_db->getQuery(true);
        /*
        $query->select('gs.good_id, gs.name as goods_name, concat(mnn.name,"(",mnn.name_rus,")") as mnn, concat(mn.name, " ", mn.name_rus) as mans,'
                . ' gs.note, gc.good_id as good_id_old');	
	$query->from('#__goods gs');
        $query->innerJoin("#__mans mn on mn.man_id = gs.man_id");
        $query->innerJoin("#__mnn mnn on mnn.mnn_id = gs.mnn_id");
        $query->innerJoin("#__goods_crossing gc on gc.good_id_new = gs.good_id");
	if(JRequest::getVar('good_id'))
            $query->where('gs.good_id ='.JRequest::getVar('good_id'));	
        $query->where('ifnull(gs.note,"") <> ""');        
	$query->order('gs.good_id');          */
        
        $query->select('good_id, goods_name, mnn, mans, note');
        $query->from('#__catalog');
	if(JRequest::getVar('good_id'))
            $query->where('good_id ='.JRequest::getVar('good_id'));        
	$query->order('goods_name');  
        
        $this->_db->setQuery($query, $this->limitstart, $this->perPage);
        $this->_db->query();
        $rows=$this->_db->loadObjectList();
        $total = $this->getTotal();                   
        $this->pagination = new JPagination($total,$this->limitstart,$this->perPage);
                
        return $rows;
    }    
        
    public function getPagination() {
      
        return $this->pagination;
       
    }
    
    
       
}