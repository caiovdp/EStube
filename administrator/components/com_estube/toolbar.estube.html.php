<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class toolbar_estube {
function _NEW() {
  JToolBarHelper::save();
  JToolBarHelper::apply();
  JToolBarHelper::cancel();
}

function _APPLY() {
  JToolBarHelper::save();
  JToolBarHelper::apply();
  JToolBarHelper::cancel();
}

function _DEFAULT() {
  JToolBarHelper::title( JText::_( 'EStube Cursos' ),'generic.png' );
/*  JToolBarHelper::customX('tmpl','edit','edit','Template',false);
  JToolBarHelper::divider();*/
  JToolBarHelper::editList();
  JToolBarHelper::deleteList();
  JToolBarHelper::divider();
//  JToolBarHelper::addNew();
  JToolBarHelper::customX('import','new','new','Import',false);
}

function _TEMPLATE() {
  JToolBarHelper::save();
  JToolBarHelper::apply();
  JToolBarHelper::cancel();
}

}
?>