<?php
App::uses('AppController', 'Controller');
/**
 * Patients Controller
 *
 * @property Patient $Patient
 * @property PaginatorComponent $Paginator
 */
class PatientsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $paginate = [
        'limit' => 5,
        'order' => [
            'Patient.id' => 'asc'
        ]
	];

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Patient->recursive = 0;
		$this->set('patients', $this->Paginator->paginate());
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
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Paciente Invalido'));
		}
		$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
		$this->set('patient', $this->Patient->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Patient->create();
			if ($this->Patient->save($this->request->data)) {
			//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El paciente ha sido guardado correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta exitosa
				return $this->redirect(array('controller'=>'forecasts','action' => 'index'));
			} else {
				//prueba alerta
				//$this->Session->setFlash('<h6>¡El paciente fue gardado!</h6>', 'default', array('class' => 'card red accent-2'));
			}
		}
		$departments = $this->Patient->Department->find('list');
		$states = $this->Patient->State->find('list');
		$this->set(compact('departments', 'states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Patient->exists($id)) {
			throw new NotFoundException(__('Paciente invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Patient->save($this->request->data)) {
			//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El paciente ha sido actualizado correctamente</h5>
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
							<h5>El paciente no ha podido ser guardado. Por favor, trate de nuevo</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta fallo
			}
		} else {
			$options = array('conditions' => array('Patient.' . $this->Patient->primaryKey => $id));
			$this->request->data = $this->Patient->find('first', $options);
		}
		$departments = $this->Patient->Department->find('list');
		$states = $this->Patient->State->find('list');
		$this->set(compact('departments', 'states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Patient->id = $id;
		if (!$this->Patient->exists()) {
			throw new NotFoundException(__('Paciente invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Patient->delete()) {
		//inicio alerta exitosa
			$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>El paciente ha sido eliminado</h5>
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
						<h5>El paciente no ha podido ser eliminado. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
		}
		return $this->redirect(array('action' => 'index'));
	}
}
