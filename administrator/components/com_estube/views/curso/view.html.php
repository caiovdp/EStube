<?php

defined('_JEXEC') or die('Restricted access');
 

jimport('joomla.application.component.view');
//include JPATH_ADMINISTRATOR."/includes/estube.php";

class EstubeViewCurso extends JView
{

  function display($tpl = null) 
  {
    // Check for errors.
    // Procura por erros.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    $id = JRequest::getVar('id');
    
    if($id){
      $this->item = getCurso($id,true,true);
    }

    parent::display($tpl);
  }

} 
