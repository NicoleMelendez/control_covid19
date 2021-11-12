<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('HTML','Form','Time');
	public $components = array('Paginator');

/**
 * Funciones para autentiacion
 */
	//funcion para filtrar los accesos permitidos antes de autenticar
	public function beforeFilter(){
		parent::beforeFilter(); //llamando a la funcion [beforeFilter] del appController
		//se comenta porque ahora se maneja desde isAuthorized	//$this->Auth->allow('login','logout'); //puede acceder a la login
	}
	
	//permisos del usuario digitador
	public function isAuthorized($user)
    {
        if($user['type_user_id'] != '1')
        {  
			if(in_array($this->action, array('edit')))//si accede a estas acciones es permitido
			{
				return true;
			}
			else
			{
				if($this->Auth->user('id'))//si el usuario sigue logeado
				{
					$this->Session->setFlash('
					<div class="card red accent-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">error_outline</i>
							<h5>Acceso denegado, consulte al administrador del sistema.</h5>
						</div>
					</div>
					','default',array('class'=>''));
					$this->redirect($this->Auth->redirect());
				}
			}
        }
        return parent::isAuthorized($user);
	}

	//funcion login para realizar el inicio de sesion
	public function login(){
		if($this->request->is('post')) //verifica si accede mediante metodo post
		{
			if($this->Auth->login()) //verifica si accede correctamente la metodo login
			{
				return $this->redirect($this->Auth->redirectUrl()); //retornamos el metodo [redirectUrl] para decirle donde retornar 
			}
			$this->Session->setFlash(
				'<div class="card red accent-2 col s12 m7  offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">error_outline</i>
						<h6>Usuario y/o contraseña incorrectos.</h6>
					</div>
				</div>			
				','default', //de no ser exitoso el inicio de sesion
				array('class'=>'alert alert-danger')); //se muestra el siguiente mensaje con la clase setflash
		}
	}

	//funcion para cerrar sesion
	public function logout(){
		return $this->redirect($this->Auth->logout()); //manda a la direccion establecida en el logout hecho en el [appController] 
	}

/**
 * fin Funciones para autentiacion
 */

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario invalido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
					//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El usuario ha sido guardado correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta exitosa
				return $this->redirect(array('action' => 'index'));
			} else {
				//prueba alerta
				//$this->Session->setFlash('<h6>¡El usuario fue gardado!</h6>', 'default', array('class' => 'card red accent-2'));
			}
		}
		$typeUsers = $this->User->TypeUser->find('list');
		$this->set(compact('typeUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario invalido'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			if($this->Auth->user(array('TypeUser','id')) == '1')
			{
				if($this->request->data['User']['new_password'] != null || $this->request->data['User']['confirm_password'] != null)
				{
					if(($this->request->data['User']['new_password'] != null && $this->request->data['User']['confirm_password'] != null) && ($this->request->data['User']['new_password'] == $this->request->data['User']['confirm_password']))
					{
						$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
						if ($this->User->save($this->request->data)) 
						{
							$this->Session->setFlash(
							'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
								<div class="col m12 s12">
									<i class="medium material-icons yellow-text right">check_circle_outline</i>
									<h5>El usuario ha sido actualizado correctamente</h5>
								</div>
							</div>', 'default', array('class' => ''));
							if($this->Auth->user('id') == $id){	
								return $this->redirect(array('controller'=>'pages','action' => 'home'));
							} else { 
								return $this->redirect(array('action' => 'index')); 
							}
						} 
						else 
						{
							$this->Session->setFlash(
							'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
								<div class="col m12 s12">
									<i class="medium material-icons yellow-text right">error_outline</i>
									<h5>El usuario no ha podido ser guardado. Por favor, trate de nuevo</h5>
								</div>
							</div>', 'default', array('class' => ''));
						}
					}
					else 
					{
						$this->Session->setFlash(
						'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
							<div class="col m12 s12">
								<i class="medium material-icons yellow-text right">error_outline</i>
								<h5>Las contraseñas no coinciden, intente de nuevo.</h5>
							</div>
						</div>', 'default', array('class' => ''));
					}
				} 
				else 
				{
					if ($this->User->save($this->request->data)) 
					{
						$this->Session->setFlash(
						'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
							<div class="col m12 s12">
								<i class="medium material-icons yellow-text right">check_circle_outline</i>
								<h5>El usuario ha sido actualizado correctamente</h5>
							</div>
						</div>', 'default', array('class' => ''));
						if($this->Auth->user('id') == $id){	
							return $this->redirect(array('controller'=>'pages','action' => 'home'));
						} else { 
							return $this->redirect(array('action' => 'index')); 
						}
					} 
					else 
					{
						$this->Session->setFlash(
						'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
							<div class="col m12 s12">
								<i class="medium material-icons yellow-text right">error_outline</i>
								<h5>El usuario no ha podido ser guardado. Por favor, trate de nuevo</h5>
							</div>
						</div>', 'default', array('class' => ''));
					}
				} 
			} 
			else 
			{
				if($this->Auth->user('id') == $id)
				{
					if($this->request->data['User']['new_password'] != null || $this->request->data['User']['confirm_password'] != null)
					{
						if(($this->request->data['User']['new_password'] != null && $this->request->data['User']['confirm_password'] != null) && ($this->request->data['User']['new_password'] == $this->request->data['User']['confirm_password']))
						{
							$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
							if ($this->User->save($this->request->data)) 
							{
								$this->Session->setFlash(
								'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
									<div class="col m12 s12">
										<i class="medium material-icons yellow-text right">check_circle_outline</i>
										<h5>El usuario ha sido actualizado correctamente</h5>
									</div>
								</div>', 'default', array('class' => ''));
								return $this->redirect(array('controller'=>'pages','action' => 'home'));
							} 
							else 
							{
								$this->Session->setFlash(
								'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
									<div class="col m12 s12">
										<i class="medium material-icons yellow-text right">error_outline</i>
										<h5>El usuario no ha podido ser guardado. Por favor, trate de nuevo</h5>
									</div>
								</div>', 'default', array('class' => ''));
							}
						}
						else 
						{
							$this->Session->setFlash(
							'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
								<div class="col m12 s12">
									<i class="medium material-icons yellow-text right">error_outline</i>
									<h5>Las contraseñas no coinciden, intente de nuevo.</h5>
								</div>
							</div>', 'default', array('class' => ''));
						}
					} 
					else 
					{
						if ($this->User->save($this->request->data)) 
						{
							$this->Session->setFlash(
							'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
								<div class="col m12 s12">
									<i class="medium material-icons yellow-text right">check_circle_outline</i>
									<h5>El usuario ha sido actualizado correctamente</h5>
								</div>
							</div>', 'default', array('class' => ''));
							return $this->redirect(array('controller'=>'pages','action' => 'home'));
						} 
						else 
						{
							$this->Session->setFlash(
							'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
								<div class="col m12 s12">
									<i class="medium material-icons yellow-text right">error_outline</i>
									<h5>El usuario no ha podido ser guardado. Por favor, trate de nuevo</h5>
								</div>
							</div>', 'default', array('class' => ''));
						}
					}	
				}
				else 
				{
					$this->Session->setFlash(
						'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">error_outline</i>
							<h5>Acceso denegado, consulte al administrador.</h5>
						</div>
					</div>', 'default', array('class' => ''));
				}
			}
		} 
		else 
		{
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$typeUsers = $this->User->TypeUser->find('list');
		$this->set(compact('typeUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario invalido.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			//inicio alerta exitosa
			$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>El usuario ha sido eliminado</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta exitosa
		} else {
				//inicio alerta fallo
			$this->Session->setFlash(
				'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">error_outline</i>
						<h5>El usuario no ha podido ser eliminado. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
		}
		return $this->redirect(array('action' => 'index'));
	}
}






