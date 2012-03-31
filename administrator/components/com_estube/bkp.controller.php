<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
// importando a biblioteca Joomla controller
jimport('joomla.application.component.controller');
 
/**
 * General Controller of HelloWorld component
 * Controlador Geral do componente HelloWorld
 */
class EstubeController extends JController
{
  /**
   * display task
   * tarefa exibir
   *
   * @return void
   */
  function display($cachable = false) 
  {
    // set default view if not set
    // define a visão padrão caso não esteja definida
    JRequest::setVar('view', JRequest::getCmd('view', 'Estube'));
    // call parent behavior
    // chama o método da classe pai
    parent::display($cachable);
  }

  function add(){
    $id = JRequest::getVar('id');    
    if($id){
      $is_new = false;
    }else{
      $is_new = true;
    }
    JRequest::setVar('view', JRequest::getCmd('view', 'cadastro'));
    JRequest::setVar('id', $id);
    JRequest::setVar('is_new', $is_new);
    parent::display();
  }
  function save(){
    JRequest::setVar('view', JRequest::getCmd('view', 'estube'));
    $this->store();
    parent::display();
    $this->setRedirect(JRoute::_("index.php?option=com_estube", false));
  }

  function apply(){
    $last_id = $this->store();
    JRequest::setVar('id', $last_id);
    $this->setRedirect(JRoute::_("index.php?option=com_estube&task=add&id=$last_id", false));
//    parent::display();
  }

  private function store(){
      $arr = array("id" => 'id',"id_content" => 'jform_content_id',
		"valor" => 'jform_valor',"matricule_se" => 'jform_matricule_se',"linha_1" => 'jform_linha1',"linha_2" => 'jform_linha2',"linha_3" => 'jform_linha3',"linha_4" => 'jform_linha4',"linha_5" => 'jform_linha5',"linha_6" => 'jform_linha6',"linha_7" => 'jform_linha7',"linha_8" => 'jform_linha8',"linha_9" => 'jform_linha9');
      foreach($arr as $imp => $col){
	    $$imp = JRequest::getVar($col);
      }
      if($id == "")
	  $id = "NULL";
      $database = JFactory::getDBO();
      $database->setQuery("REPLACE INTO #__cursos_estube (id,id_content,valor,matricule_se,linha_1,linha_2,linha_3,linha_4,linha_5,linha_6,linha_7,linha_8,linha_9) VALUES ($id,$id_content,'$valor','$matricule_se','$linha_1','$linha_2','$linha_3','$linha_4','$linha_5','$linha_6','$linha_7','$linha_8','$linha_9')");
      $database->query();
      $last_id = $database->insertid();
      if($id == "NULL")
	return $last_id;
      else
	return $id;
  }

  function remove(){
    $cid = JRequest::getVar('cid');
    $database = JFactory::getDBO();
    foreach ($cid as $id){
//	echo "DELETE FROM #__cursos_estube where id=$id<br>";
      $database->setQuery("DELETE FROM #__cursos_estube where id=$id");
      $database->query();
    }
    $this->setRedirect(JRoute::_("index.php?option=com_estube", false));
  }

}

class TmplController extends JController
{
  function display($cachable = false) 
  {
    // set default view if not set
    // define a visão padrão caso não esteja definida
    JRequest::setVar('view', JRequest::getCmd('view', 'Tmpl'));
    // call parent behavior
    // chama o método da classe pai
    parent::display($cachable);
  }  

  function apply(){
   
  	$this->store();
  	$this->setRedirect(JRoute::_("index.php?option=com_estube&controller=tmpl", false));
  }
  
  function save(){
    $this->store();
    $this->setRedirect(JRoute::_("index.php?option=com_estube", false));
  }
  
  function cancel(){
  	$this->setRedirect(JRoute::_("index.php?option=com_estube", false));
  }
  
  private function store(){
  	$tmpl  = $_POST['jform_template_1'];
  	$tmpl1 = $_POST['jform_template_2'];
  	$tmpl2 = $_POST['jform_template_3'];
  	$database = JFactory::getDBO();
	$database->setQuery("UPDATE #__template_estube set template='".urlencode($tmpl)."' WHERE id=1");
	$database->query();
	$database->setQuery("UPDATE #__template_estube set template='".urlencode($tmpl1)."' WHERE id=2");
    $database->query();
	$database->setQuery("UPDATE #__template_estube set template='".urlencode($tmpl2)."' WHERE id=3");
    $database->query();
  }

}


