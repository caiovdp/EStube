<?php
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
 
// Importando a biblioteca de vis�o do Joomla
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 */
class OlaViewOla extends JView
{
        // Sobrescrevendo o m�todo display de JView
        function display($tpl = null) 
        {
                // Atribuindo dados � vis�o
                $this->msg = 'Hello World';
 
                // Esibir a vis�o
                parent::display($tpl);
        }
} 
