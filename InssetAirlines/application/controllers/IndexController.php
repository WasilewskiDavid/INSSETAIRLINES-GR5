<?php
 
class IndexController extends Zend_Controller_Action
{
 
    public function init(){
    }
 
    public function indexAction(){
		$this->_helper->actionStack('login', 'index', 'default', array());
    }
	
	public function testingAction(){
	}
	
	public function developmentAction(){
		$this->_helper->actionStack('login', 'index', 'default', array());
		//recupere la base
		$db = Zend_Registry::get('db');
		
		//requetage
		//$requete = $db->select()
		//				->from('la table' , array('les paramétres à afficher');
	}
	
	public function loginAction(){
		$this->_helper->viewRenderer->setResponseSegment('login');
	}
}