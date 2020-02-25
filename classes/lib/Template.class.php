<?php 

namespace lib;

class Template {
    // Path to template

    protected $template;

    // Vars passed in 

    protected $vars = array();

    // constructor
    public function __construct($template)
    {
        $this->template = $template;
    }

    // getting and setting key value pairs to pass into the template page, whichever it is
    public function __get($key) {
        return $this->vars[$key];
    }
    public function __set($key, $value) {
         $this->vars[$key] = $value;
    }

    // using variables passed into template object

    public function __toString() {
        // this extracts the variables passed into with the key value pairs
        extract($this->vars);

        // change directory to directory passed into the template variable
        chdir(dirname($this->template));

        //start a buffer with the template variable
        ob_start();

        // include the file in the path given by the template variable
        include basename($this->template);

        //clean current buffer output
        return ob_get_clean();
    }


}