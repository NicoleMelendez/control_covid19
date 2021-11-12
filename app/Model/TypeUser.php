<?php
App::uses('AppModel', 'Model');
/**
 * TypeUser Model
 *
 */
class TypeUser extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title_type';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title_type' => array(
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

/**
 * hasMany associations
 *
 * @var array
 */
 
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'type_user_id',
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
