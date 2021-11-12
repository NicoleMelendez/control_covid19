<?php
App::uses('AppModel', 'Model');
/**
 * Recommendation Model
 *
 * @property Alert $Alert
 */
class Recommendation extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'advice' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Por favor, complete los datos que le solicita el campo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sanction' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Por favor, complete los datos que le solicita el campo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'communique' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Alert' => array(
			'className' => 'Alert',
			'foreignKey' => 'alert_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
