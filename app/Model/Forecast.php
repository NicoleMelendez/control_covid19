<?php
App::uses('AppModel', 'Model');
/**
 * Forecast Model
 *
 * @property ForecastState $ForecastState
 * @property Patient $Patient
 */
class Forecast extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ForecastState' => array(
			'className' => 'ForecastState',
			'foreignKey' => 'forecast_state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
