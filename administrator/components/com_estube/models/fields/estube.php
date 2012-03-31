 
<?php
// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die;
 
// import the list field type
// importando a lista de tipos de campo
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldEstube extends JFormFieldList
{
  /**
   * The field type.
   * O tipo de campo.
   *
   * @var    string
   */
  protected $type = 'Estube';
 
  /**
   * Method to get a list of options for a list input.
   * Método para obter a lista de opções para uma entrada de lista.
   *
   * @return  array    An array of JHtml options.
   */
  protected function getOptions() 
  {
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,id_content,valor,link1,link2,link3,link4');
    $query->from('#__estube_cursos');
    $db->setQuery((string)$query);
    $messages = $db->loadObjectList();
    $options = array();
    if ($messages)
    {
      foreach($messages as $message) 
      {
        $options[] = JHtml::_('select.option', $message->id, $message->id_content);
      }
    }
    $options = array_merge(parent::getOptions(), $options);
    return $options;
  }
}