<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initSession(){
		$session = new Zend_Session_Namespace('InssetAirlines', true);
		return $session;
	}
	
	protected function _initChargerMesLibrary(){
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('festival_');
	}
	
	protected function _initConfig() {
		Zend_Registry::set('config', new Zend_Config($this->getOptions()));
	}
	
	protected function _initDoctype(){
		$this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
	
	// protected function _initActionStack(){
		// $actionStack = Zend_Controller_Action_HelperBroker::getStaticHelper('actionStack');
		// $actionStack->actionToStack(new Zend_Controller_Request_Simple('afficher', 'menu', 'default', array()));
		// return $actionStack;
	// }
	
	protected function _initLog(){
		$this->bootstrap('frontController');
		$frontController = $this->getResource('frontController');
		$frontController->registerPlugin(new festival_controller_prelog());
	}
	
	protected function _initDb(){
		$db = Zend_Db::factory(Zend_Registry::get('config')->database);
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		Zend_Registry::set('db', $db);
	}
}
