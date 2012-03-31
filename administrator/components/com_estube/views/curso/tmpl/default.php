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

function keepAlive() {	var myAjax = new Request({method: "get", url: "index.php"}).send();} window.addEvent("domready", function(){ keepAlive.periodical(840000); });
window.addEvent('domready', function() {

	SqueezeBox.initialize({});
	SqueezeBox.assign($$('a.modal-button'), {
		parse: 'rel'
	});
});

function jInsertFieldValue(value, id) {
	var old_id = document.id(id).value;
	if (old_id != id) {
		var elem = document.id(id)
		elem.value = value;
		elem.fireEvent("change");
	}
}
</script>

<form method="post" name="adminForm" id="item-form" class="form-validate">

  <div class="width-60 fltlft">
    <fieldset class="adminform">
      <legend><?php "Atualizar Cadastro {$this->item->name}"; ?></legend>
		<ul>
		  <li>
  			<label title="" class="hasTip" for="jform_name_disable" id="jform_name_disable-lbl">Nome<span class="star">&nbsp;*</span></label>
			<input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $this->item->name;?>" id="jform_name_disable" name="jform_name_disable">
		  </li>
	    </ul>
	    
	    <ul>
		  <li>
  			<label title="" class="hasTip" for="jform_link_loja_disable" id="jform_link_loja_disable-lbl">Link loja<span class="star">&nbsp;*</span></label>
			<input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $this->item->link_loja;?>" id="jform_link_loja_disable" name="jform_link_loja_disable">
		  </li>
	    </ul>
	    
		<ul>
		  <li>
  			<label title="" class="hasTip" for="jform_id_loja_disable" id="jform_id_loja_disable-lbl">ID loja<span class="star">&nbsp;*</span></label>
			<input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $this->item->id_loja;?>" id="jform_id_loja_disable" name="jform_id_loja_disable">
		  </li>
	    </ul>

		<ul>
			  <li>
				  <label title="" class="hasTip" for="jform_valor" id="jform_valor-lbl">Valor<span class="star">&nbsp;*</span></label>
				  <input type="text" size="45" class="inputbox required" disabled="disabled" value="<? echo $this->item->valor;?>" id="jform_valor" name="jform_valor">
			  </li>
		</ul>

		<ul class="adminformlist">
			<li>
				<label title="" class="hasTip required" for="jform_request_id" id="jform_request_id-lbl">Selecione um Artigo<span class="star">&nbsp;*</span></label>
				<div class="fltlft">
					<input type="text" class="required" size="35" disabled="disabled" value="<? if($this->item->id_content){echo $this->item->content_title;}else{echo "Selecione um Artigo";} ?>" id="jform_request_id_name">
				</div>
				<div class="button2-left">
					<div class="blank">
						<a rel="{handler: 'iframe', size: {x: 800, y: 450}}" href="index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_jform_request_id" title="Selecionar ou alterar artigo" class="modal">Selecionar / Alterar</a>
					</div>
				</div>
				<input type="hidden" value="<? if($this->item->id_content){echo $this->item->id_content;} ?>" name="jform_content_id" class="required modal-value" id="jform_request_id_id" aria-required="true" required="required">
			</li>
		</ul>

		<ul>
			  <li>
				<div id="image" style="display: block;">
						<label title="" class="hasTip" for="jform_params_imageurl" id="jform_params_imageurl-lbl" aria-invalid="false">Imagem</label>						
					<div class="fltlft">
						<input type="text" size="40" readonly="readonly" value="<?php if($this->item->image){ echo $this->item->image; } ?>" id="jform_params_imageurl" name="jform_image" class="" aria-invalid="false">
					</div>
					<div class="button2-left">
						<div class="blank">
							<a rel="{handler: 'iframe', size: {x: 800, y: 500}}" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=com_banners&amp;author=&amp;fieldid=jform_params_imageurl&amp;folder=banners" title="Selecionar" class="modal">
								Selecionar</a>
						</div>
					</div>
					<div class="button2-left">
						<div class="blank">
							<a onclick="document.getElementById('jform_params_imageurl').value=''; document.getElementById('jform_params_imageurl').onchange();" href="#" title="Limpar">
								Limpar</a>
						</div>
					</div>
				</li>
		</ul>
    </fieldset>
  </div>

  <?php echo $this->loadTemplate('module'); ?>
  
  <input type="hidden" name="id_curso" value="<? echo $this->item->id; ?>" />
  <input type="hidden" name="task" value="" />
  <?php echo JHtml::_('form.token'); ?>
</form>