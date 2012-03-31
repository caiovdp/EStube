<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');
include JPATH_ADMINISTRATOR."/includes/estube.php";

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
    JRequest::setVar('view', JRequest::getCmd('view', 'Estube'));
    parent::display($cachable);
  }
  
  function import(){
  	$json = file_get_contents("http://localhost/www/json.html");
	$json = json_decode($json);
	foreach ($json->cursos as $curso)
		createCurso($curso,true);
  }

  function edit(){
  	$id = JRequest::getVar('id');
  	JRequest::setVar('view', JRequest::getCmd('view', 'curso'));
    JRequest::setVar('id', $id);
    parent::display();
  }
  
  function apply(){
  	//var_dump($_POST);
  	
  	$id_curso = JRequest::getVar('id');
  	$image = JRequest::getVar('jform_image');
  	$content_id = JRequest::getVar('jform_content_id');
  	
  	$curso = getCurso($id_curso);
  	
  	$curso->id_content = $content_id;
  	$curso->image = $image;
  	
  	$modules = JRequest::getVar('id_module');
  	$modules_desc = JRequest::getVar('jform_module_descricao');

    alterCurso($curso);
  	foreach ($modules as $key => $mod) {
  		$module = getModule($mod);

  		$module->descricao  = JRequest::getVar("jform_module_descricao_$key", '', 'post', 'string', JREQUEST_ALLOWHTML);
  		
  		//var_dump($module);
  		alterModule($curso, $module); 
  	}
  }

  function cancel(){
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
