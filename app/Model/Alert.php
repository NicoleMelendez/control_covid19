<?php
App::uses('AppModel', 'Model');
/**
 * Alert Model
 *
 * @property Recommendation $Recommendation
 */
class Alert extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title_alert';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recommendation' => array(
			'className' => 'Recommendation',
			'foreignKey' => 'alert_id',
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
