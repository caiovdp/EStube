<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
// importando a biblioteca Joomla modellist
jimport('joomla.application.component.modellist');
/**
 * HelloWorldList Model
 * Modelo HelloWorldList
 */
class EstubeModelEstube extends JModelList
{
  /**
   * Method to build an SQL query to load the list data.
   * Método para construir uma consuulta SQL para carregar a lista de dados.
   *
   * @return  string  An SQL query
   */
  protected function getListQuery()
  {
    // Create a new query object.    
    // Cria um novo objeto de consulta.    
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    // Select some fields
    // Seleciona alguns campos
    $query->select('id,greeting');
    // From the hello table
    // Da tabela hello
    $query->from('#__cursos_estube');
    return $query;
  }
}

