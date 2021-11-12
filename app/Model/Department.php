<?php
App::uses('AppModel', 'Model');
/**
 * Department Model
 *
 * @property Patient $Patient
 */
class Department extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name_department';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'department_id',
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
