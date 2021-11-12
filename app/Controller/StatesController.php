<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
			if(in_array($this->action, array('index')))//si accede a estas acciones es permitido
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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->State->recursive = 0;
		$this->set('states', $this->Paginator->paginate());
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
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Estado invalido'));
		}
		$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
		$this->set('state', $this->State->find('first', $options));
	} */

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>Estado guardado correctamente</h5>
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
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Estado invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->State->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>Estado actualizado correctamente</h5>
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
							<h5>El estado no ha podido ser guardado. Por favor, trate de nuevo</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta fallo
			}
		} else {
			$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
			$this->request->data = $this->State->find('first', $options);
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
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Estado invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->State->delete()) {
			//inicio alerta exitosa
			$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>El estado ha sido eliminado</h5>
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
						<h5>El estado no ha podido ser eliminado. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
		}
		return $this->redirect(array('action' => 'index'));
	}
}
