<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgContentEstube extends JPlugin {
  function plgContentEstube( &$subject, $params )
  {
	  parent::__construct( $subject, $params );
  }

  function onAfterDisplayContent( &$article, &$params, $limitstart ){
    global $mainframe;
    var_dump()
    return 'eu aki o!';
  }
} 
