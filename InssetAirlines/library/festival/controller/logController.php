 <?php
class festival_controller_logController{
	
	private $ipUser,$heure,$date,$controller,$action, $code;
	
	public function __construct($lecontroller,$laction){
		date_default_timezone_set('Europe/Paris');
		
		$this->ipUser =$_SERVER['REMOTE_ADDR'];
		$this->date = date('d/m/Y');
		$this->heure = date('H:i:s');
		$this->controller = $lecontroller;
		$this->action = $laction;
		
		$logger = new Zend_Log();
		$writer = new Zend_Log_Writer_Stream(APPLICATION_PATH . '/../var/logs/logs');
		
		$formatter = new Zend_Log_Formatter_Simple('%priorityName% %message%' . PHP_EOL);
		$writer->setFormatter($formatter);
		
		
		$logger->addWriter($writer);
		$logger->log($this->date.' - '.$this->heure.' - '.$this->ipUser.' - '.$lecontroller.'/'.$laction, 6);
	}
}
