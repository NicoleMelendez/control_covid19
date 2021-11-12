<?php
App::uses('AppController', 'Controller');
/**
 * Recommendations Controller
 *
 * @property Recommendation $Recommendation
 * @property PaginatorComponent $Paginator
 */
class RecommendationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recommendation->recursive = 0;
		$this->set('recommendations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recommendation->exists($id)) {
			throw new NotFoundException(__('Recomendacion invalida'));
		}
		$options = array('conditions' => array('Recommendation.' . $this->Recommendation->primaryKey => $id));
		$this->set('recommendation', $this->Recommendation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recommendation->create();
			if ($this->Recommendation->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>La recomendación ha sido guardada correctamente</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta exitosa
				return $this->redirect(array('action' => 'index'));
			} else {
			/*	$this->Session->setFlash(__('La recomendacion no ha podido ser guardada. Por favor, trate de nuevo'));*/
			}
		}
		$alerts = $this->Recommendation->Alert->find('list');
		$this->set(compact('alerts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recommendation->exists($id)) {
			throw new NotFoundException(__('Recomendacion Invalida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Recommendation->save($this->request->data)) {
				//inicio alerta exitosa
				$this->Session->setFlash(
					'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
						<div class="col m12 s12">
							<i class="medium material-icons yellow-text right">check_circle_outline</i>
							<h5>La recomendación ha sido actualizada correctamente</h5>
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
							<h5>La recomendación no ha podido ser guardada. Por favor, trate de nuevo</h5>
						</div>
					</div>'
					, 'default', array('class' => ''));
				//fin alerta fallo
			}
		} else {
			$options = array('conditions' => array('Recommendation.' . $this->Recommendation->primaryKey => $id));
			$this->request->data = $this->Recommendation->find('first', $options);
		}
		$alerts = $this->Recommendation->Alert->find('list');
		$this->set(compact('alerts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Recommendation->id = $id;
		if (!$this->Recommendation->exists()) {
			throw new NotFoundException(__('Recomendacion invalida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Recommendation->delete()) {
			//inicio alerta exitosa
			$this->Session->setFlash(
				'<div class="card green lighten-2 col m11 s10 offset-s1 black-text">
					<div class="col m12 s12">
						<i class="medium material-icons yellow-text right">check_circle_outline</i>
						<h5>La recomendación ha sido eliminada</h5>
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
						<h5>La recomendación no ha podido ser eliminada. Por favor, trate de nuevo</h5>
					</div>
				</div>'
				, 'default', array('class' => ''));
			//fin alerta fallo
				}
		return $this->redirect(array('action' => 'index'));
	}
}
