<?php
/**
 * @author Andy Sharman
 * @copyright Andy Sharman (www.udjamaflip.com)
 * @link http://www.udjamaflip.com
 * @license GNU/GPL V2+
 * @version 1.0
 * @package com_udjacomments
**/ 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Cpanel Controller
 */
class UdjaCommentsControllerCpanel extends JControllerAdmin
{

	public function getModel($name = 'Cpanel', $prefix = 'UdjaCommentsModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	public function remove()
	{
		$model = $this->getModel('cpanel');
		if(!$model->delete()) {
			$msg = JText::_( 'COM_UDJACOMMENTS_DELETECOMMENT_ERROR_MESSAGE' );
		} else {
			$msg = JText::_( 'COM_UDJACOMMENTS_DELETECOMMENT_SUCCESS_MESSAGE' );
		}
		
		$this->setRedirect( 'index.php?option=com_udjacomments', $msg );
	}
	
	public function importJComments()
	{		
		$model	= $this->getModel('cpanel');
		$app	= JFactory::getApplication();
		
		if(!$result = $model->import('jcomments')) {
			$msg = JText::_( 'COM_UDJACOMMENTS_IMPORTJCOMMENTS_ERROR_MESSAGE' );
		}
		else
		{
			if ($result > 0) {
				$app->enqueueMessage($result . ' ' . JText::_( 'COM_UDJACOMMENTS_IMPORTJCOMMENTS_IMPORTED_MESSAGE' ));
			}
			else
			{
				$app->enqueueMessage(JText::_( 'COM_UDJACOMMENTS_IMPORTJCOMMENTS_NONEIMPORTED_MESSAGE' ));
			}
		}
		
		$app->redirect( 'index.php?option=com_udjacomments');
	}
	
}