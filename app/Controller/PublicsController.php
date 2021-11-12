<?php
App::uses('AppController', 'Controller');

class PublicsController extends AppController {
	public $helpers = array('HTML','Form','Time');

	//funcion para filtrar los accesos permitidos antes de autenticar
	public function beforeFilter(){
		parent::beforeFilter(); //llamando a la funcion [beforeFilter] del appController
		$this->Auth->allow('index');
	}
/**
 * Components
 *
 * @var array
 */

	public function index() {
		$this->Public->recursive = 0;
		$this->set('publics');
	}

}
