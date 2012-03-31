<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');
 
// load tooltip behavior
// Carrega a funcionalidade tooltip
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
?>
<form action="<?php echo JRoute::_('index.php?option=com_estube'); ?>" 
   method="post" name="adminForm">
  <table class="adminlist">   <thead><?php echo $this->loadTemplate('head');?></thead>
    <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
    <tbody><?php echo $this->loadTemplate('body');?></tbody>
  </table>
		<input type="hidden" value="0" name="boxchecked">
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>

</form> 