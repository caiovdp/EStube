<?php
defined('_JEXEC') or die('Restricted Access');
?>
<?php 
  	foreach ($this->item->modules as $key => $module){
 ?>
<div class="width-60 fltlft">
    <fieldset class="adminform">
    	
      <legend>Modulo <?php echo "$key"; ?> - <?php echo "{$module->name}"; ?></legend>
		<ul>
		  <li>
  			<label title="" class="hasTip" for="jform_module_name_disable_<?php echo "$key"; ?>" id="jform_name_disable-lbl">Nome<span class="star">&nbsp;*</span></label>
			<input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $module->name;?>" id="jform_module_name_disable_<?php echo "$key"; ?>" name="jform_module_name_disable[]">
		  </li>
	    </ul>
	    <ul>
		  <li>
  			<label title="" class="hasTip" for="jform_module_valor_disable_<?php echo "$key"; ?>" id="jform_valor_disable-lbl">Valor<span class="star">&nbsp;*</span></label>
			<input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $module->name;?>" id="jform_module_name_disable_<?php echo "$key"; ?>" name="jform_module_valor_disable[]">
		  </li>
	    </ul>
  			<label title="" class="hasTip" for="jform_module_descricao_<?php echo "$key"; ?>" id="jform_module_descricao-lbl">Descrição<span class="star">&nbsp;*</span></label>
			<div class="clr"></div>
			<!--textarea class="inputbox" id="jform_module_descricao_<?php echo "$key"; ?>" name="jform_module_descricao[]"><? echo $module->descricao;?></textarea-->
			<?php
				$editor =& JFactory::getEditor();
				echo $editor->display("jform_module_descricao_{$key}", $module->descricao, '100%', '250', '60', '20', false);
			?>
	    <input type="hidden" name="id_module[]" value="<? echo $module->id; ?>" />
    </fieldset>
</div>
<?php 
  	}
  ?>