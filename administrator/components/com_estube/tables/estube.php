<?php
// No direct access
// Sem acesso direto
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
// importando a biblioteca table
jimport('joomla.database.table');

class EstubeTableEstube extends JTable {
  
  var $id = 0;
  var $id_content = 0;
  var $valor = "";
  var $link1 = "";
  var $link2 = "";
  var $link3 = "";
  var $link4 = "";
  
  function __construct(&$db){
    parent::__construct('#__estube_cursos', 'id', $db);
  }

  function replaceObject( ) {
    $table = $this->_tbl;
    $object = $this;
    $fmtsql = 'REPLACE INTO '.mysql_escape_string($table).' ( %s ) VALUES ( %s ) ';
    $fields = array();
    foreach (get_object_vars( $object ) as $k => $v) {
      if (is_array($v) or is_object($v) or $v === NULL) {
	continue;
      }
      if ($k[0] == '_') { // internal field
	continue;
      }
      $fields[] = mysql_escape_string( $k );
      $values[] = "'" . mysql_escape_string( $v ) . "'";
    }
    $this->_db->setQuery( sprintf( $fmtsql, implode( ",", $fields ) ,  implode( ",", $values ) ) );
    if (!$this->_db->query()) {
      return false;
    }
    return true;
  }

}