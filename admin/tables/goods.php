<?php

defined('_JEXEC') or die("Restricted access");

class TableCatalog extends JTable{    

    public function __construct($db)   {
        parent::__construct("#__catalog", 'good_id', $db);
    }   
    
}

