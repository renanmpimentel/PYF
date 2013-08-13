<?php 
	
	class ClienteController extends Controller
	{	
		protected $cliente;
		protected $clientes = array();
		protected $filtros  = array();

		public function __construct()
		{
			parent::__construct();

			$this->cliente = new Cliente();

			if(!$this->getSession("S_LOGADO")) //Permissão logado
				$this->redirectView("Login/acessar");

			if(false) //Permissão do Módulo
			{				
				$errorController = new ErrorController();
				$errorController->setMessage(new Message("ATENÇÃO:","Acesso Negado ao Módulo de CLIENTE!",Message::$DANGER));
				$errorController->show();
				exit();							
			}	
		}

		public function listar()
		{				
			$clienteDAO = new ClienteDAO();
			$this->clientes = $clienteDAO->listar();
			$this->setView("ClienteLista");
		}

		public function cadastrar()
		{
			$this->setView("ClienteForm");
		}

		public function alterar()
		{			
			$clienteDAO = new ClienteDAO();

			if(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $this->cliente = $clienteDAO->recuperar(HTA_PARAM3))
			{
				$this->cadastrar();
			}else{
				$this->setMessage(new Message("ATENÇÃO:","Cliente não encontrado!",Message::$DANGER));
				$this->listar();
			}			
		}

		public function salvar()
		{			
			if(!$_POST)
			{
				$this->setMessage(new Message("ATENÇÃO:","Dados não enviados!",Message::$DANGER));
				$this->cadastrar();
			}else{

				$clienteDAO = new ClienteDAO();

				//exit(Utility::dateFormat($_POST["dataNascimento"], "d/m/Y"));

				$this->cliente->setIdCliente($_POST["idCliente"]);
				$this->cliente->setNome($_POST["nome"]);
				$this->cliente->setCpf($_POST["cpf"]);
				$this->cliente->setRg($_POST["rg"]);
				$this->cliente->setEmail($_POST["email"]);
				$this->cliente->setDataExpedicao("2013-01-01");
				$this->cliente->setOrgaoEmissor($_POST["orgaoEmissor"]);
				$this->cliente->setDataNascimento("1985-10-06");
				$this->cliente->setCep($_POST["cep"]);
				$this->cliente->setLogradouro($_POST["logradouro"]);
				$this->cliente->setNumero($_POST["numero"]);
				$this->cliente->setBairro($_POST["bairro"]);
				$this->cliente->setEstado($_POST["estado"]);
				$this->cliente->setCidade($_POST["cidade"]);
				$this->cliente->setTelefone($_POST["telefone"]);
				$this->cliente->setCelular($_POST["celular"]);
				$this->cliente->setStatus($_POST["status"]);

				if($clienteDAO->salvar($this->cliente))
				{
					$this->setMessage(new Message("ATENÇÃO:","Cliente '".$this->cliente->getNome()."' cadastrado com sucesso!",Message::$SUCESS));
					$this->listar();
				}else{
					$this->setMessage(new Message("ATENÇÃO:","Erro ao salvar cliente!",Message::$DANGER));	
					$this->cadastrar();
				}
				
			}
		}

		public function excluir()
		{
			$clienteDAO = new ClienteDAO();

			if(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $clienteDAO->excluir(HTA_PARAM3))
			{
				$this->setMessage(new Message("ATENÇÃO:","Cliente excluido com sucesso!",Message::$SUCESS));				
			}else{	
				$this->setMessage(new Message("ATENÇÃO:","Erro ao excluir cliente!",Message::$DANGER));
			}

			$this->listar();
		}
	}

?>  