<?php
/**
 * Markdown helper class.
 *
 * @author   Martin Bean <martin@martinbean.co.uk>
 * @package  Cake.Plugin.SirTrevor
 * @license  MIT License
 */

App::import('Lib', 'SirTrevor.Markdown');
App::uses('AppHelper', 'View/Helper');

/**
 * Markdown hlper class.
 */
class MarkdownHelper extends AppHelper {
    
    /**
     * Renders a string of Markdown-formatted text as HTML.
     *
     * @param string $text
     * @return string
     */
    public function render($text) {
        return Markdown($text);
    }
}