<?php
/**
 * Sir Trevor helper class.
 *
 * @author   Martin Bean <martin@martinbean.co.uk>
 * @package  Cake.Plugin.SirTrevor
 * @license  MIT License
 */
App::uses('AppHelper', 'View/Helper');

/**
 * Sir Trevor helper class.
 */
class SirTrevorHelper extends AppHelper {
    
    /**
     * Helpers that this helper itself uses.
     * @var array
     */
    public $helpers = array(
        'Form'
    );
    
    /**
     * Renders a textarea, specifically for use with Sir Trevor.
     *
     * @param string $name
     * @param array $options
     * @return string
     */
    public function input($name, $options = array()) {
        $options['type'] = 'textarea';
        $options['required'] = false;
        
        return $this->Form->input($name, $options);
    }
}