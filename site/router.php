<?php

defined('_JEXEC') or die("Restricted access");

function GoodsBuildRoute(&$query){
           
    $segments = array();    
    
    if(isset($query['goods'])){
        $segments[] =$query['goods'];
        unset($query['goods']);
    }

    if(isset($query['layout'])){
        $segments[] =$query['layout'];
        unset($query['layout']);
    }         
   
  
    if(isset($query['good_id'])){
        $segments[] = $query['good_id'];
        unset($query['good_id']);
    }
    
    
//    $_SESSION['segments'] = $segments;
    return $segments;    
}

function GoodsParseRoute($segments){
    $vars = array();          
  
    switch ($segments[0]){
        case 'goods':
            $vars['goods'] = 'goods';                           
            break;
                        
        case 'good':
            $vars['layout'] = 'good';            
            $vars['good_id'] = $segments[1];                   
            break;
        
    }       
    
//    $_SESSION['vars'] = $vars;
    return $vars;
}

