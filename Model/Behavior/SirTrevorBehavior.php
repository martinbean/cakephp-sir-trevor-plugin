<?php
/**
 * Sir Trevor model behavior class.
 *
 * @author   Martin Bean <martin@martinbean.co.uk>
 * @package  Cake.Plugin.SirTrevor
 * @license  MIT License
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
                'field' => 'content'
            );
        }
        $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array)$settings);
    }
    
    /**
     * Re-formats Sir Trevor block data into a nice array to work with.
     *
     * @param Model $Model
     * @param array $posts
     * @param boolean $primary
     * @return array
     */
    public function afterFind(Model $Model, $posts, $primary = false) {
        foreach ($posts as $i => $post) {
            if (isset($post['Post'])) {
                $blocks = json_decode($post['Post']['content'], true);
                $posts[$i]['Block'] = $blocks['data'];
            }
        }
        return $posts;
    }
}