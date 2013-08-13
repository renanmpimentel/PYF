<?php
	
	class Controller
	{	
		private $messages = array();

		public function __construct()
		{
			if(!session_id()) session_start();
		}

		public function setView($view)
		{
			if(file_exists("./View/{$view}.php"))
				include_once("./View/{$view}.php");
			else if(file_exists(WWW_ROOT_PYF . "/View/{$view}.php"))
				include_once(WWW_ROOT_PYF . "/View/{$view}.php");
			else{
				$errorController = new ErrorController();
				$errorController->setMessage(new Message("ATENÇÃO:","View {$view} inexistente!",Message::$DANGER));
				$errorController->show();
				exit();					
			}
		}

		public function redirectView($view)
		{
			header("location:" . WEB_ROOT_APP . "/" . $view);
			exit();
		}

		public function setSession($index, $value){
 			$_SESSION[$index] = $value;
 		}

 		public function getSession($index){
 			return isset($_SESSION[$index]) ? $_SESSION[$index] : false;
 		}

		public function setMessage(Message $message){
 			$this->messages[] = $message;
 		}

 		public function getMessages(){
 			return $this->messages;
 		}
	}

?>  