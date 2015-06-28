<?php 
defined('_JEXEC') or die("Restricted access"); 


// Выбираем инофрмацию об аптеке из выборки
$row = $this->items[0];

$doc = JFactory::getDocument();
$title = $doc->setTitle('Медикаменты в аптеках Курска, аптеки в Курске '.$row->goods_name);
$description = $doc->setDescription('Медикаменты в аптеках Курска, Аптеки в Курске,'.$row->goods_name.', всё для вашего здоровья');

$dir = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'goods'.DIRECTORY_SEPARATOR;

?>

<form class="adminform">
<h1><?=$row->goods_name; ?></h1>
<table>
    <tr>
        <td width="400" height="400">
        <?php  
        if(file_exists($dir.$row->good_id.'.jpg')): ?>
            <img src="<?=JUri::root().'images/goods/'.$row->good_id.'.jpg'; ?>" alt="<?=$row->goods_name; ?>" width="300">
        <?php else: ?>
        <img src="<?=JUri::root().'images/goods/noimage.jpg'; ?>" width="300"> 
        <?php  endif;         
        ?>   
        </td>
        <td width="200"></td>
        <td class="right">             
            <h2><?=$row->mans; ?> </h2>
            <h2><?=$row->mnn; ?> </h2>
        </td>
    </tr>
</table>

<div class="contentpane">
    <?=$row->note; ?>    
</div>
<a href="<?=JRoute::_('index.php?option=com_goods'); ?>"><<< Вернуться к перечню товаров <<< </a>

</form>


