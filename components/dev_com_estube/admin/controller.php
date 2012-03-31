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
}