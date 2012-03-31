<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
include JPATH_ADMINISTRATOR."/includes/estube.php";

class plgContentEstube extends JPlugin {
  function plgContentEstube( &$subject, $params )
  {
	  parent::__construct( $subject, $params );
  }

  private function getTemplate($id){
	$database = JFactory::getDBO();
	$database->setQuery("SELECT * FROM #__template_estube WHERE id=$id");
	$modules = $database->loadObject();
	return urldecode($modules->template); 
  }
function onContentAfterTitle( $article, $params){
	
	if(isset($params->fulltext)){
		return '';
	}else{
		$curso = getCursoByContent($params->id);	
		if($curso)
			return  "<img src=\"{$curso->image}\" width='200' />";
		else
			return '';
	}
	
}
function onContentBeforeDisplay( $article, $params)
{
	if(isset($params->fulltext)){
			$document = &JFactory::getDocument();
			$database = JFactory::getDBO();
			$database->setQuery('SELECT * FROM #__cursos_estube WHERE `id_content`='.$params->id.' LIMIT 1');
			$modules = $database->loadObjectList();
			if(isset($modules[0])){
				$modules = $modules[0];
				$tmpl = $this->getTemplate(3);
			//return $this->template_replace($tmpl,$modules);
				return "";
		}else{
			return '';
		}
	}else{
		return '';
	}
}

  function onContentAfterDisplay($item, &$article)
  {
  	$curso = getCursoByContent($article->id, true);
  	if($curso){
	  	if(isset($article->id)){
	  		if(isset($article->fulltext)){
	  			$html = "";
	  			foreach ($curso->modules as $key => $module) {
	  				 $html .= "<h3>{$module->name}</h3>";
	  				 $html .= $module->descricao;
	  				 $html .= "<br/>"; 				
	  			}
			return $html;
	  		}else{
	  			$params = &$article->params;
				if ($params->get('access-view'))
					$link = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid));
				else{
					$menu = JFactory::getApplication()->getMenu();
					$active = $menu->getActive();
					$itemId = $active->id;
					$link1 = JRoute::_('index.php?option=com_users&view=login&&Itemid=' . $itemId);
					$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid));
					$link = new JURI($link1);
					$link->setVar('return', base64_encode($returnURL));
				}
	  			return "<div><a href='$link' class='comprar'>Comprar</a></div>";	
	  		}
	  		
		}else{
			return "";
		}
	}else
		return "";
  }

function template_replace($tmpl,$modules){

	$arr = array("valor","matricule_se","linha_1" ,"linha_2","linha_3","linha_4","linha_5","linha_6","linha_7","linha_8","linha_9");
	
	foreach ($arr as $ln){
	    $search = "{".$ln."}";
	    $replace = $modules->$ln;
	    $tmpl = str_replace($search, $replace, $tmpl);
	}
	return $tmpl;
   }
} 
