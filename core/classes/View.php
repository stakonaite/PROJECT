<?php


namespace Core;


class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Renders array of $this->data into template file
     * @param string $template_path
     * returns string Rendered HTML
     */

    public function render($template_path)
    {
        if (!file_exists($template_path)) {
            throw (new\Exception("Template with filename: " . "$template_path does not exist!"));
        }

        //pass arguments to the ***tpl.php as $data variable
        $data = $this->data;

        //start buffering output to memory
        ob_start();
        //load the view
        require $template_path;

        //return buffered output as string
        return ob_get_clean();
    }
}