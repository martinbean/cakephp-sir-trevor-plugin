<?php
/**
 * Post model.
 *
 * @author   Martin Bean <martin@martinbean.co.uk>
 * @package  Cake.Plugin.SirTrevor
 * @license  MIT License
 */
class Post extends SirTrevorAppModel {
    
    /**
     * Name of the model.
     *
     * @var string
     */
    public $name = 'Post';
    
    /**
     * List of behaviors to load when this model object is initialized.
     *
     * @var array
     */
    public $actsAs = array(
        'SirTrevor.SirTrevor'
    );
    
    /**
     * Validation rules for this model.
     *
     * @var array
     */
    public $validate = array(
        'title' => 'notEmpty',
        'content' => 'notEmpty'
    );
}