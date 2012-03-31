<?php


// No direct access to this file
// Sem acesso direto ao arquivo
defined('_JEXEC') or die('Restricted access');


// import Joomla modelitem library
// importando a biblioteca modelitem do Joomla
jimport('joomla.application.component.modelitem');


/**
 * HelloWorld Model
 */
class OlaModelOla extends JModelItem
{
        /**
         * @var string msg
         */
        protected $msg;
 
	/**
	* Returns a reference to the a Table object, always creating it.
	* Retorna uma referência ao objeto Table, sempre criando-o.
	*
	* @param  type  The table type to instantiate
	* @param  string  A prefix for the table class name. Optional.
	* @param  array  Configuration array for model. Optional.
	* @return  JTable  A database object
	* @since  1.6
	*/
	public function getTable($type = 'Ola', $prefix = 'OlaTable', $config = array())
	{
	  return JTable::getInstance($type, $prefix, $config);
	}


        /**
         * Get the message
         * @return string The message to be displayed to the user
         */
        public function getMsg() 
        {
                if (!isset($this->msg)) 
                {
                        $id = JRequest::getInt('id');

			//Get a TableOla instancie
			$table = $this->getTable();

			//Load the message
			$table->load($id);
			
			$this->msg = $table->greeting;
		
                }
                return $this->msg;
        }
}