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
class EstubeViewCadastro extends JView
{
  /**
   * HelloWorlds view display method
   * Método display da visão HelloWorlds
   * @return void
   */
  function display($tpl = null) 
  {
    // Check for errors.
    // Procura por erros.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    $is_new = JRequest::getVar('is_new');
    $id = JRequest::getVar('id');
    $this->is_new = $is_new;
    
    if(!$is_new){
      $database = JFactory::getDBO();
      $database->setQuery('SELECT estube.*,content.title FROM #__cursos_estube as estube inner join #__content as content on content.id = estube.id_content WHERE estube.id='.$id.' LIMIT 1');

      $this->item = $database->loadObject();
    }
    // Assign data to the view
    // Atribui dados para a visão
  //  $this->items = $items;
    
    // Display the template
    // Exibe o template
    parent::display($tpl);
  }

} 
