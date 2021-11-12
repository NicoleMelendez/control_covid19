<?php
App::uses('AppModel', 'Model');
/**
 * ForecastState Model
 *
 * @property Forecast $Forecast
 */
class ForecastState extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title_forecast';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Forecast' => array(
			'className' => 'Forecast',
			'foreignKey' => 'forecast_state_id',
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
