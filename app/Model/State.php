<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
 * @property Patient $Patient
 */
class State extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title_state';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title_state' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Por favor, complete los datos que le solicita el campo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
