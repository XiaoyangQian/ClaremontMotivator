<?php

class BaseController
{
    /*
     * Deals with view rendering
     * (a tiny template engine, for convenience only, it is put in a controller.)
     */

    protected $view_params = [];
    protected $BASE_VIEW_PATH = '/view/base_layout.php';

    protected function setViewParam($param_name, $param_value)
    {
        $this->view_params[$param_name] = $param_value;
    }

    public function renderView($template_file_path)
    {
        // uses global variable hack to make $this->view_params available for templates
        global $view_params;
        $view_params = $this->view_params;

        function view_param($param_name)
        {
            global $view_params;
            echo @$view_params[$param_name];
        }

        // render $template_file_path to global variable $content_html
        ob_start();
        require $template_file_path;
        global $content_html;
        $content_html = ob_get_clean();


        // export for BASE_VIEW to call
        function render_content()
        {
            global $content_html;
            echo $content_html;
        }

        // render and show BASE_VIEW
        require $this->BASE_VIEW_PATH;
    }
}