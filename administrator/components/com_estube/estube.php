<?php
defined('_JEXEC') or die('Restricted access');
 

jimport('joomla.application.component.controller');


$controller_I = JRequest::getCmd('controller');
//echo JRequest::getCmd('task');
if (JRequest::getCmd('task')=='tmpl'){
	$controller_I = 'Tmpl';
}
if(empty($controller_I)){
	$controller_I = 'Estube';
}
$controller = JController::getInstance($controller_I);

// Executar a requisição task
$controller->execute(JRequest::getCmd('task'));
 
// Redirecionar se definido pelo controlador
$controller->redirect();