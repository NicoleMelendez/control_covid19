<?php
App::uses('AppController', 'Controller');
/**
 * Forecasts Controller
 *
 * @property Forecast $Forecast
 * @property PaginatorComponent $Paginator
 */
class ForecastsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $paginate = [
		'limit' => 5,
		'order' => [
			'Forecast.id' => 'asc'
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
		$this->Forecast->recursive = 0;
		$this->set('forecasts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Forecast->exists($id)) {
			throw new NotFoundException(__('Pronostico invalido'));
		}
		$options = array('conditions' => array('Pronotico.' . $this->Forecast->primaryKey => $id));
		$this->set('forecast', $this->Forecast->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Forecast->create();
			if ($this->Forecast->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El pronóstico ha sido guardado correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta exitosa
				return $this->redirect(array('action' => 'index'));
			} else {
				/*$this->Session->setFlash(__('El pronostico no pudo ser guardado. Por favor, trate de nuevo.'));*/
			}
		}
		$forecastStates = $this->Forecast->ForecastState->find('list');
		$patients = $this->Forecast->Patient->find('list');
		$this->set(compact('forecastStates', 'patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Forecast->exists($id)) {
			throw new NotFoundException(__('Pronostico Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Forecast->save($this->request->data)) {
					//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>El pronóstico ha sido actualizado correctamente</h5>
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
							<h5>El pronóstico no ha podido ser guardado. Por favor, trate de nuevo</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta fallo
			}
		} else {
			$options = array('conditions' => array('Forecast.' . $this->Forecast->primaryKey => $id));
			$this->request->data = $this->Forecast->find('first', $options);
		}
		$forecastStates = $this->Forecast->ForecastState->find('list');
		$patients = $this->Forecast->Patient->find('list');
		$this->set(compact('forecastStates', 'patients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Forecast->id = $id;
		if (!$this->Forecast->exists()) {
			throw new NotFoundException(__('Pronostico invalido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Forecast->delete()) {
		//inicio alerta exitosa
			$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>El pronóstico ha sido eliminado</h5>
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
						<h5>El pronóstico no ha podido ser eliminado. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
		}
		return $this->redirect(array('action' => 'index'));
	}
}
