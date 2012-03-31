<?php
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
 
// Importando a biblioteca de visão do Joomla
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 */
class OlaViewOla extends JView
{
        // Sobrescrevendo o método display de JView
        function display($tpl = null) 
        {
                // Atribuindo dados à visão
                $this->msg = $this->get('Msg');
		
		if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Esibir a visão
                parent::display($tpl);
        }
} 
