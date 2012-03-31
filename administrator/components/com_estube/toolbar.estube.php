<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'toolbar_html' ) );
switch($task)
{
case 'apply':
  toolbar_estube::_APPLY();
break;
case 'edit':
  toolbar_estube::_NEW();
break;
case 'add':
  toolbar_estube::_NEW();
break;
default:
	if($controller->getname() == 'tmpl')
	toolbar_estube::_TEMPLATE();
	else
	toolbar_estube::_DEFAULT();
break;
}
?> 
