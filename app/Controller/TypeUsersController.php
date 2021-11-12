<?php
App::uses('AppController', 'Controller');
/**
 * TypeUsers Controller
 *
 * @property TypeUser $TypeUser
 * @property PaginatorComponent $Paginator
 */
class TypeUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('HTML','Form','Time');
	public $components = array('Paginator');
	

	
	//funcion para filtrar los accesos permitidos antes de autenticar
	public function beforeFilter(){
		parent::beforeFilter(); //llamando a la funcion [beforeFilter] del appController
		//se comenta porque ahora se maneja desde isAuthorized	//$this->Auth->allow('login','logout'); //puede acceder a la login
	}

	//permisos del usuario digitador
	public function isAuthorized($user)
	{
		if($user['type_user_id'] != '1')//si es diferente de 1 no puede acceder a las acciones del controlador
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
		return parent::isAuthorized($user);
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TypeUser->recursive = 0;
		$this->set('typeUsers', $this->Paginator->paginate());
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
		if (!$this->TypeUser->exists($id)) {
			throw new NotFoundException(__('Tipo de usuario invalido'));
		}
		$options = array('conditions' => array('TypeUser.' . $this->TypeUser->primaryKey => $id));
		$this->set('typeUser', $this->TypeUser->find('first', $options));
	}
	*/
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TypeUser->create();
			if ($this->TypeUser->save($this->request->data)) {
					//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El tipo de usuario ha sido guardado correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta exitosa
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('El tipo de usuario no ha podido ser guardado. Por favor, trate de nuevo'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TypeUser->exists($id)) {
			throw new NotFoundException(__('Invalid type user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TypeUser->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El tipo de usuario ha sido actualizado correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				return $this->redirect(array('action' => 'index'));
			} else {
				//inicio alerta fallo
				$this->Session->setFlash(
						'<div class="card red accent-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">error_outline</i>
							<h5>El tipo de usuario no ha podido ser guardado. Por favor, trate de nuevo</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta fallo
			}
		} else {
			$options = array('conditions' => array('TypeUser.' . $this->TypeUser->primaryKey => $id));
			$this->request->data = $this->TypeUser->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TypeUser->id = $id;
		if (!$this->TypeUser->exists()) {
			throw new NotFoundException(__('Tipo de usuario invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TypeUser->delete()) {
		$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>El tipo de usuario ha sido eliminado</h5>
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
						<h5>El tipo de usuario no ha podido ser eliminado. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
		}
		return $this->redirect(array('action' => 'index'));
	}
}
