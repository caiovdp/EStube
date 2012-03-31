<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
  <tr>
    <td>
      <?php echo JHtml::_('grid.id', $i, $item->id);?>
    </td>
    <td>
      <?php echo $item->id; ?>
    </td>
    <td>
      <a href="<?php echo JRoute::_("index.php?option=com_estube&task=edit&id={$item->id}", false); ?>">
      	<?php echo $item->name; ?>
      </a>
    </td>
    <td>
      <?php echo $item->title ?>
      
    </td>
    <td>
      <?php echo $item->valor; ?>
    </td>
  </tr>
<?php endforeach; ?> 
