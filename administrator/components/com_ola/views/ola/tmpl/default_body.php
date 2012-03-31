<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
  <tr>
    <td>
      <?php echo JHtml::_('grid.id', $i, $item->id); ?>
    </td>
    <td>
      <?php echo $item->id; ?>
    </td>

    <td>
      <?php echo $item->greeting; ?>
    </td>
  </tr>
<?php endforeach; ?> 
