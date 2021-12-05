<?php
include_once'autoload.php';
class eolCharacter
{
    public $eol;

    /**
     * @param bool false $html
     */
    public function __construct($cli = true) {
        if ($cli) {
            $this->eol = PHP_EOL;
        } else {
            $this->eol = '<br/>';
        }
    }
}