<?php
declare(strict_types=1);

use Phalcon\Session\Manager;

class IndexController extends ControllerBase
{

    public function indexAction(){

    }

    public function loginAction(){

    	//Verificar se existe uma requisição POST
    	if($this->request->isPost()){
    	
    		$dados = $this->request->getPost();

			$email = $dados['email'];
    		$password = $dados['password'];

    		$user = Users::findFirst([
    			'conditions' => 'email = ?1 AND password = ?2',
    			'bind' => [
    				1 => $email,
    				2 => $password,
    			]
    		]);

    		if($user){

    			$this->session->set('AUTH_ID', $user->id);
    			$this->session->set('AUTH_NOME', $user->nome);
    			$this->session->set('AUTH_EMAIL', $user->email);
    			$this->session->set('AUTH_PASSWORD', $user->password);

    			//$this->flashSession->success('Login realizado com sucesso!');

                $this->getProperty();
                $this->view->pick("index/painel");//Determinar qual a VIEW será renderizada!

    		}else{
    			$this->flashSession->error('Error. Email e/ou Senha errados!');
                return $this->response->redirect('index/index');
    		}

    	}	

    }

    public function getProperty(){

        //$imoveis = Imovel::find();
        $sql = "select imo.tipoImovel, imo.descricao, imo.bairro, imo.localizacao, imo.valor, imob.nome, imob.cidade, imob.email from imovel as imo 
                join imobiliaria as imob 
                on imo.imobiliariaid = imob.id ";

        $query = $this->modelsManager->createQuery($sql);
        $imoveis = $query->execute();

        $this->view->imoveis = $imoveis;//Enviar a variavel $imovel para a VIEW

    }

    public function painelAction(){

        if($this->session->get('AUTH_NOME') == null || $this->session->get('AUTH_NOME') == ''){
            
            $this->flashSession->success('Você não tem permissão para acessar o painel!!!');
            return $this->response->redirect('index/index');

            $this->view->disable(); //Aqui serve para ler o que está dentro do metodo e não a view 
        }

    }

    public function editarAction($id){

        $user = Users::find($id);

        $this->view->usuario = $user;//Enviar a variavel $user para a VIEW
        $this->view->pick("index/editar");//Determinar qual a VIEW será renderizada!

    }

    public function atualizarAction(){

        $usuario = new Users();

        $usuario->id = $this->request->getPut('idUser');
        $usuario->nome = $this->request->getPut('nomeUser');
        $usuario->email = $this->request->getPut('emailUser');
        $usuario->password = $this->request->getPut('passwordUser');

        $sucesso = $usuario->save();

        if($sucesso){
            $this->flashSession->success('Atualizado com sucesso!');
        }else{
            echo "Descupe, ocorreu um erro ou atualizar: ";

            $messages = $usuario->getMessages();

            foreach ($messages as $message) {
                $this->flashSession->error($message->getMessage());
            }

        }

        $this->getProperty();

        $this->view->pick("index/painel");
        //$this->response->redirect("index/painel");

    }

    public function logoutAction(){
        
        //https://docs.phalcon.io/4.0/en/session

        echo "Aqui: ".$this->session->get('AUTH_NOME');

        if($this->session->get('AUTH_NOME') != null || $this->session->get('AUTH_NOME') != ''){

            $session = new Manager();

            unset($session->AUTH_ID);
            unset($session->AUTH_NOME);
            unset($session->AUTH_EMAIL);
            unset($session->AUTH_PASSWORD);

            //$session->destroy(); //Essa session mata o mensagem do $this->flashSession

            $this->flashSession->success('Usuário deslogado com sucesso!');
            return $this->response->redirect('index/index');
            
        }

    }

    public function createAction(){

    }

    public function createAccountAction(){
        echo "Estou no createAccountAction rs";



        $user = new Users();

        $dados = $this->request->getPost();
        $password = $dados['password'];
        $confirmPassword = $dados['confirmPassword'];

            if($password != $confirmPassword){
                $this->flashSession->error('Erro. Favor digitar as senhas iguais!!!');
                return $this->response->redirect('index/create');
            }

        $user->nome = $this->request->getPost('nome');
        $user->email = $this->request->getPost('email');
        $user->password = $this->request->getPost('password');

        $status = $user->save();

        if($status){
            $this->flashSession->success('Usuário cadastrado com sucesso!');
        }else{
            $this->flashSession->error('Erro. Ocorreu um erro ao cadastrar o usuário!');
        }

        return $this->response->redirect('index/create'); 

    }



}

