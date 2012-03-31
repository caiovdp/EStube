<?php
// No direct access
// Sem acesso direto
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
// importando a biblioteca table
jimport('joomla.database.table');

class EstubeTableEstube extends JTable {
  function __construct(&$db){
    parent::__construct('#__cursos_estube', 'id', $db);
  }
}