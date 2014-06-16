<?php
/**
 * Sir Trevor model behavior class.
 *
 * @author	 Martin Bean <martin@martinbean.co.uk>
 * @package	 Cake.Plugin.SirTrevor
 * @license	 MIT License
 */

App::uses('ModelBehavior', 'Model');

/**
 * Sir Trevor model behavior class.
 */
class SirTrevorBehavior extends ModelBehavior {
	
	/**
	 * Sets up the model behavior.
	 *
	 * @param Model $Model
	 * @param array $settings
	 * @return void
	 */
	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'contentField' => 'content'
			);
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array)$settings);
	}

	/**
	 * Adds validation to the field specified as the content field.
	 *
	 * @param Model $Model
	 * @param array $options
	 * @return void
	 */
	public function beforeValidate(Model $Model, $options = array()) {
		$Model->validator()->add('content', 'notEmpty', array(
			'rule' => 'notEmpty',
		));
	}

	/**
	 * Re-formats Sir Trevor block data into a nice array to work with.
	 *
	 * @param Model $Model
	 * @param array $results
	 * @param boolean $primary
	 * @return array
	 */
	public function afterFind(Model $Model, $results, $primary = false) {
		$alias = $Model->alias;
		$contentField = $this->getContentField($Model);
		foreach ($results as $i => $result) {
			if (isset($result[$alias])) {
				$blocks = json_decode($result[$alias][$contentField], true);
				$results[$i]['Block'] = $blocks['data'];
			}
		}
		return $results;
	}

	/**
	 * Returns the name of the content field.
	 *
	 * @param Model $Model
	 * @return string
	 */
	public function getContentField(Model $Model)
	{
		return $this->settings[$Model->alias]['contentField'];
	}
}
