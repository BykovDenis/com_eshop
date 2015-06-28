<?php 
defined('_JEXEC') or die("Restricted access"); 

// Выбираем инофрмацию об аптеке из выборки
$row = $this->items[0];

?>

<form class="adminform">
<h1><?=$row->goods_name; ?></h1>
<table>
    <tr>
        <td>
            <?php if (file_exists(JUri::root().'images/goods/'.$row->good_id_old.'.jpg')): ?>
            <img class="image-preview" src="<?= JUri::root().'images/goods/'.$row->good_id_old.'.jpg'; ?>"  width="300" /> 
            <?php else: ?>
            <img src="<?= JUri::root().'images/goods/noimage.jpg'; ?>" width="300" /> 
            <?php endif; ?>  
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
<p><a href="<?=  JUri::current()?>?option=com_goods"><<< вернуться к списку товаров <<< </a></p>

</form>


