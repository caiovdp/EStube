<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class Curso{
	public $id;
	public $id_loja;
	public $name;
	public $valor;
	public $link_loja;
	public $ativo;
	public $id_content;
	public $image;
}

class Modulo{
	public $id;
	public $id_modulo_loja;
	public $name;
	public $valor;
	public $descricao;
	public $id_curso;
}

function getCursoByLoja($id,$modules=FALSE){
	
	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_cursos WHERE id_loja=$id";
	
	$database->setQuery($query);
	
	return $database->loadObject();
}

function getCursoByContent($id,$modules=FALSE){
	
	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_cursos WHERE id_content=$id";
	
	$database->setQuery($query);
	
	$curso = $database->loadObject();
	if($curso){
		if($modules){
			$curso->modules = getListModule($curso->id);
		}
	}else{
		return  null;
	}
	return $curso;
	
}

function getCurso($id, $modules=FALSE,$content=FALSE){
	
	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_cursos WHERE id=$id";
	
	$database->setQuery($query);
	
	$curso = $database->loadObject();
	
	if($modules){
		$curso->modules = getListModule($id);
	}
	
	if($content){
		$query = "SELECT title FROM #__content WHERE id=$id";
		$database->setQuery($query);
		$curso->content_title = $database->loadResult();
	}
	
	return $curso;
}

function getListModule($id){
	
	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_modulo WHERE id_curso=$id order by id";
	
	$database->setQuery($query);
	
	return $database->loadObjectList();
		
}

function getModule($id){

	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_modulo WHERE id=$id";
	
	$database->setQuery($query);
	
	return $database->loadObject();
	
}

function getModuloByLoja($id){
	
	$database = JFactory::getDBO();
	
	$query = "SELECT * FROM #__estube_modulo WHERE id_modulo_loja=$id";
	
	$database->setQuery($query);
	
	return $database->loadObject();
	
}

function createCurso($new,$mod = FALSE){
	$curso = getCursoByLoja($new->id);
	if($curso){
		alterCurso($curso,$new);
	}else{
		$curso = new Curso();
		
		$curso->id_loja = $new->id;
		$curso->name = $new->nome;
		$curso->valor = $new->valor;
		$curso->link_loja = $new->link;
		$curso->ativo = 0;
		
		$database = JFactory::getDBO();
		
		$database->insertObject('#__estube_cursos', $curso);

		$curso->id=$database->insertid();
		
	}
	if($mod){
		$modulos = $new->modulos;
		foreach ($modulos as $modulo){
			
			createModule($curso,$modulo);
		}
	}
}

function alterCurso($old,$new=null){
	if($new){
		$old->name = $new->nome;
		$old->valor = $new->valor;
		$old->link_loja = $new->link;
	}
	
	$database = JFactory::getDBO();

	if(!$database->updateObject('#__estube_cursos', $old, 'id')){
		echo $database->stderr();
	}
}

function createModule($curso,$mod){
	
	$modulo = getModuloByLoja($mod->id);
	
	if($modulo){
		alterModule($curso,$modulo,$mod);
	}else{
		
		$modulo = new Modulo();
		
		$modulo->id_modulo_loja = $mod->id;
		
		$modulo->name = $mod->nome;
		
		$modulo->valor = $mod->valor;
		
		$modulo->id_curso = $curso->id;
		
		$db = JFactory::getDBO();
		$db->insertObject('#__estube_modulo', $modulo);
		
	}
	
}

function alterModule($curso,$old,$new=NULL){
	if($new){
		$old->name = $new->nome;
		
		$old->valor = $new->valor;
	}
	$db = JFactory::getDBO();
		
	if(!$db->updateObject('#__estube_modulo', $old, 'id')){
		echo $database->stderr();
	}
	
}
