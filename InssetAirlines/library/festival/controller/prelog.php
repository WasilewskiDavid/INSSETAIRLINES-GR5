<?php
class festival_controller_prelog extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch (Zend_Controller_Request_Abstract $request)
    {
        $action = $request->getParam('action');
		$controller = $request->getParam('controller');
		
		if($controller != 'favicon.ico')
			new festival_controller_logController($controller,$action);
    }
}
?>