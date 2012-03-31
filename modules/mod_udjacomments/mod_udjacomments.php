<?php
/**
 * @author Andy Sharman
 * @copyright Andy Sharman (www.udjamaflip.com)
 * @link http://www.udjamaflip.com
 * @license GNU/GPL V2+
 * @version 1.0
 * @package mod_udjacomments
**/ 

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
//instantiate helper
$helper		= new modUdjaCommentsHelper();

//detect if we should be displaying the module
if ($helper->getViewable())
{

	//get the user (if they're logged in)
	$user		= JFactory::getUser();

	//get current URL - This is important
	$juri = JFactory::getUri();
	$currentUrl	= JURI::Current();
	$currentUrl .= ($juri->getQuery()) ? '?'.$juri->getQuery() : '';
	$currentUrl = htmlspecialchars($currentUrl, ENT_QUOTES, 'UTF-8');
	$comment_url = str_ireplace(JURI::base(),'',$currentUrl);	
	$comment_url = preg_replace('/[?|&]pageNumber\=[0-9]+/s','',$comment_url);
	
	//default to displaying the form
	$displayForm = true;
	
	//get japplication
	$application = JFactory::getApplication();
	
	//Are we dealing with a submission?
	if (JRequest::getString('hdnCommentForm'))
	{
		
		if ($helper->saveComment($comment_url))
		{
			$helper->sendNotifications($comment_url);
			$application->redirect($currentUrl, JText::_('MOD_UDJACOMMENTS_COMMENTSAVE_SUCCESS'), 'message');
		}
	}
	
	//is there an unsubscribe request?	
	if ($url = JRequest::getString('unsubscribe') && $email = JRequest::getString('email'))
	{	
		if ($helper->setUnsubscribe($url, $email))
		{
			$newUrl = JURI::getInstance($currentUrl);
			$newUrl->delVar('unsubscribe');
			$newUrl->delVar('email');
			
			$application->redirect($newUrl->toString(), JText::_('MOD_UDJACOMMENTS_UNSUBSCRIBE_SUCCESS'), 'message');
		}
	}
	
	require JModuleHelper::getLayoutPath('mod_udjacomments', $params->get('layout', 'default'));
	
}