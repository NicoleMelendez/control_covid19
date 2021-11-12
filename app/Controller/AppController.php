<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    
    public $components = array(
        'Session',//llamamos los componentes de sesion y de autenticacion 
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'home' //en [loginRedirect] especificamos el controlador al que redireccionaremos al iniciar sesión
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login' //aqui, la direccion al momento de cerrar sesion
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish' //autenticacion con bcrypt de la version 2.3 de cakephp
                )
            ),
            'authorize' => array('Controller'),
            'authError' => false
        )
    );

    //funcion para filtrar los accesos permitidos de los tipos de usuario
    public function beforeFilter()
    {
        $this->Auth->allow('login','logout'); //se declaran los accesos permitidos sin necesidad de iniciar sesion
        $this->set('current_user',$this->Auth->user()); //variable [current_user] almacena los datos de autenticacion del usuario actual
    }
    
    public function isAuthorized($user)
    {   //valida si el tipo de usuario está 
        if(isset($user['type_user_id']))
        {  
            return true; //se valida el tipo de usuario
        }
        return false;
        /* Condicional que limita le acceso al sistema a 2 tipos de usuarios
        if(isset($user['type_user_id']) && $user['type_user_id'] == '1' || $user['type_user_id'] == '2')
        {  
            return true; //se valida el tipo de usuario
        }
        return false;*/ 
	}
}
