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

    			$this->flashSession->success('Login realizado com sucesso!');
                return $this->response->redirect('index/painel');
    		}else{
    			$this->flashSession->error('Error. Email e/ou Senha errados!');
                return $this->response->redirect('index/index');
    		}


    	}	

    }

    public function painelAction(){

        if($this->session->get('AUTH_NOME') == null || $this->session->get('AUTH_NOME') == ''){
            
            $this->flashSession->success('Você não tem permissão para acessar o painel!!!');
            return $this->response->redirect('index/index');

            $this->view->disable(); //Aqui serve para ler o que está dentro do metodo e não a view 
        }

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

