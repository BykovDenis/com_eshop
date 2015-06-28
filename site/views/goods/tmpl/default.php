<?php 
defined('_JEXEC') or die("Restricted access");

$dir = JUri::root().'images/goods/';
$dir = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'goods'.DIRECTORY_SEPARATOR;

?>

<form action="index.php" method="post"  name="adminForm" id="adminForm">
    <table class="adminlist">
        <thead>
            <tr>
                <th width="150">Изображение товаров</th>                    
                <th width="400">Наименование товара</th>
                <th width="300">МНН</th>
                <th width="150">Производитель</th>                
            </tr>
        </thead>
        <?php
        $k = 0;        
        for($i=0, $n = count($this->items); $i<$n; $i++):        
            $row = $this->items[$i];                        
        ?>
        <tr class="<?php echo "row$k"; ?>">

        <td>
        <?php 
        if(file_exists($dir.$row->good_id.'.jpg')): ?>
            <img src="<?=JUri::root().'images/goods/'.$row->good_id.'.jpg'; ?>"  width="150"  alt="<?=$row->goods_name; ?>"  /> 
            <?php else: ?>
            <img src="<?=JUri::root().'images/goods/noimage.jpg'; ?>" width="150" />
            <?php endif; ?>
        </td>
        <td>
            <!--a href="<?= JUri::current();?>?option=com_goods&layout=good&good_id=<?= $row->good_id; ?>"> <?php echo $row->goods_name; ?></a-->
             <a href="<?=JRoute::_('index.php?option=com_goods&layout=good&good_id='.$row->good_id); ?>"> <?=$row->goods_name; ?></a>
        </td>            
        <td>
            <?php echo $row->goods_name; ?></a>
        </td>            
        <td>
            <?php echo $row->mnn; ?></a>
        </td>          
        <td>
            <?php echo $row->mans; ?></a>
        </td>                 
        </tr>
        <?php $k = 1-$k; 
        endfor;
        ?>
    </table>
    <!--a href="<?= JUri::current() ?>?option=com_goods"><<< Вернуться к перечню аптек <<< </a-->
    <!--a href="<?=JRoute::_('index.php?option=com_goods'); ?>"><<< Вернуться к перечню товаров <<< </a-->
    
    <?php echo $this->pagination->getListFooter();  ?>
    
    <input type="hidden" name="option" value="com_goods" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecker" value="0" />    
    
    <?php echo JHtml::_('form.token'); ?>    
</form>