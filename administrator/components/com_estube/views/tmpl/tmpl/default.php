<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.modal');

?>

<form method="post" name="adminForm" id="item-form" class="form-validate">
  <div class="width-80 fltlft">
    <fieldset class="adminform">
      <legend>HOME</legend>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_template_1" id="jform_template_1">Template<span class="star">&nbsp;*</span></label>
				  <textarea rows="20" style="width:680px;" name="jform_template_1"><?php echo urldecode($this->items[0]->template) ?></textarea>
			  </li>
		</ul>
    </fieldset>
  </div>
    <div class="width-80 fltlft">
    <fieldset class="adminform">
      <legend>Interno Superior</legend>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_template_2" id="jform_template_2">Template<span class="star">&nbsp;*</span></label>
				  <textarea rows="20" style="width:680px;" name="jform_template_2"><?php echo urldecode($this->items[1]->template) ?></textarea>
			  </li>
		</ul>
    </fieldset>
  </div>
    <div class="width-80 fltlft">
    <fieldset class="adminform">
      <legend>Interno Inferior</legend>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_template_3" id="jform_template_3">Template<span class="star">&nbsp;*</span></label>
				  <textarea rows="20" style="width:680px;" name="jform_template_3"><?php echo urldecode($this->items[2]->template) ?></textarea>
			  </li>
		</ul>
    </fieldset>
  </div>
  
  <input type="hidden" name="id" value="<? if(!$this->is_new){echo $this->item->id;} ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="controller" value="Tmpl" />
  <?php echo JHtml::_('form.token'); ?>
</form>