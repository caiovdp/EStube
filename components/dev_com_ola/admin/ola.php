<?php
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
 
// importando a biblioteca joomla controller
jimport('joomla.application.component.controller');
 
// Obter uma instância do controlador prefixado por HelloWorld
$controller = JController::getInstance('Ola');
 
// Executar a requisição task
$controller->execute(JRequest::getCmd('task'));
 
// Redirecionar se definido pelo controlador
$controller->redirect();