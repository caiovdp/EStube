<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted Access');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.modal');

?>

<script>

function jSelectArticle_jform_request_id(id, title, catid, object) {
		document.id("jform_request_id_id").value = id;
		document.id("jform_request_id_name").value = title;
		SqueezeBox.close();
	}
</script>

<form method="post" name="adminForm" id="item-form" class="form-validate">

  <div class="width-60 fltlft">
    <fieldset class="adminform">
      <legend><?php echo empty($this->item->id) ? 'Novo Cadastro' : "Atualizar Cadastro {$this->item->title}"; ?></legend>

		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_valor" id="jform_valor-lbl">ID<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox required" value="<? /*if(!$this->is_new){echo $this->item->valor;} */?>" id="jform_valor" name="jform_valor">
			  </li>
		</ul>
		
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_valor" id="jform_valor-lbl">Valor<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox required" value="<? /*if(!$this->is_new){echo $this->item->valor;} */?>" id="jform_valor" name="jform_valor">
			  </li>
		</ul>

		<ul class="adminformlist">
			<li>
				<label title="" class="hasTip required" for="jform_request_id" id="jform_request_id-lbl">Selecione um Artigo<span class="star">&nbsp;*</span></label>
				<div class="fltlft">
					<input type="text" class="required" size="35" disabled="disabled" value="<? if(!$this->is_new){echo $this->item->title;}else{echo "Selecione um Artigo";} ?>" id="jform_request_id_name">
				</div>
				<div class="button2-left">
					<div class="blank">
						<a rel="{handler: 'iframe', size: {x: 800, y: 450}}" href="index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_jform_request_id" title="Selecionar ou alterar artigo" class="modal">Selecionar / Alterar</a>
					</div>
				</div>
				<input type="hidden" value="<? if(!$this->is_new){echo $this->item->id_content;} ?>" name="jform_content_id" class="required modal-value" id="jform_request_id_id" aria-required="true" required="required">
			</li>
		</ul>

    </fieldset>
  </div>
  <div class="width-60 fltlft">
    <fieldset class="adminform">
      <legend><?php echo empty($this->item->id) ? 'Novo Cadastro' : "Atualizar Cadastro {$this->item->title}"; ?></legend>
		<ul class="adminformlist">
			<li>
				<label title="" class="hasTip required" for="jform_request_id" id="jform_request_id-lbl">Selecione um Artigo<span class="star">&nbsp;*</span></label>
				<div class="fltlft">
					<input type="text" class="required" size="35" disabled="disabled" value="<? if(!$this->is_new){echo $this->item->title;}else{echo "Selecione um Artigo";} ?>" id="jform_request_id_name">
				</div>
				<div class="button2-left">
					<div class="blank">
						<a rel="{handler: 'iframe', size: {x: 800, y: 450}}" href="index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_jform_request_id" title="Selecionar ou alterar artigo" class="modal">Selecionar / Alterar</a>
					</div>
				</div>
				<input type="hidden" value="<? if(!$this->is_new){echo $this->item->id_content;} ?>" name="jform_content_id" class="required modal-value" id="jform_request_id_id" aria-required="true" required="required">
			</li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_valor" id="jform_valor-lbl">Valor<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox required" value="<? if(!$this->is_new){echo $this->item->valor;} ?>" id="jform_valor" name="jform_valor">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_matricule_se" id="jform_link1-lbl">Link matricule-se<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox required" value="<? if(!$this->is_new){echo $this->item->matricule_se;} ?>" id="jform_matricule_se" name="jform_matricule_se">
			  </li>
		</ul>
    </fieldset>
  </div>
  <div class="width-60 fltlft">
    <fieldset class="adminform">
      <legend>Front-end</legend>

		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha1" id="jform_linha1-lbl">Linha 1<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_1;} ?>" id="jform_linha1" name="jform_linha1">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha2" id="jform_linha2-lbl">Linha 2<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_2;} ?>" id="jform_linha2" name="jform_linha2">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha3" id="jform_linha3-lbl">Linha 3<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_3;} ?>" id="jform_linha3" name="jform_linha3">
			  </li>
		</ul>

    </fieldset>
  </div>
  <div class="width-60 fltlft">
    <fieldset class="adminform">
      <legend>Back-end</legend>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha4" id="jform_linha4-lbl">Linha 1<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_4;} ?>" id="jform_linha4" name="jform_linha4">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha5" id="jform_linha5-lbl">Linha 2<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_5;} ?>" id="jform_linha5" name="jform_linha5">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha6" id="jform_linha6-lbl">Linha 3<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_6;} ?>" id="jform_linha6" name="jform_linha6">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha7" id="jform_linha7-lbl">Linha 4<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_7;} ?>" id="jform_linha7" name="jform_linha7">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha8" id="jform_linha8-lbl">Linha 5<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_8;} ?>" id="jform_linha8" name="jform_linha8">
			  </li>
		</ul>
		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_linha9" id="jform_linha9-lbl">Linha 6<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox" value="<? if(!$this->is_new){echo $this->item->linha_9;} ?>" id="jform_linha9" name="jform_linha9">
			  </li>
		</ul>
    </fieldset>
  </div>
  <input type="hidden" name="id" value="<? if(!$this->is_new){echo $this->item->id;} ?>" />
  <input type="hidden" name="task" value="" />
  <?php echo JHtml::_('form.token'); ?>
</form>