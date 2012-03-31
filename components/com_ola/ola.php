<?php
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');

// Importando a biblioteca do controlador do Joomla
jimport('joomla.application.component.controller');
 
// Obtendo uma instância do controlador que contém o prefixo HelloWorld
$controller = JController::getInstance('Ola');
 
// Executando a requisição de tarefa
$controller->execute(JRequest::getCmd('task'));
 
// Redirecionar se estiver definido pelo controlador
$controller->redirect();