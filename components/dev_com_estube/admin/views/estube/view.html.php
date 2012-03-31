<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
// importando a biblioteca Joomla view
jimport('joomla.application.component.view');
 
/**
 * HelloWorlds View
 * Visão HelloWorlds
 */
class EstubeViewEstube extends JView
{
  /**
   * HelloWorlds view display method
   * Método display da visão HelloWorlds
   * @return void
   */
  function display($tpl = null) 
  {
    // Get data from the model
    // Obtem dados do modelo
    $items = $this->get('Items');
    $pagination = $this->get('Pagination');
 
    // Check for errors.
    // Procura por erros.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }
    // Assign data to the view
    // Atribui dados para a visão
    $this->items = $items;
    $this->pagination = $pagination;
 
    // Display the template
    // Exibe o template
    parent::display($tpl);
  }
} 
