<?php
	
	class LoginController extends Controller
	{	
		public function __construct()
		{
			parent::__construct();
		}

		public function acessar()
		{
			$this->setSession("S_LOGADO",false);
			$this->setView("LoginForm");
		}

		public function sair()
		{			
			$this->setMessage(new Message("ATENÇÃO:","Logout realizado!",Message::$INFO));
			$this->acessar();
		}

		public function validar()
		{
			if($_POST["usuario"] == "admin" && $_POST["senha"] == "admin")
			{
				$this->setSession("S_LOGADO",true);
				$this->redirectView("Principal/inicio");
			}else{
				$this->setMessage(new Message("ATENÇÃO:","Usuário ou senha inválidos!",Message::$DANGER));
				$this->acessar();
			}
		}
	}

?>  