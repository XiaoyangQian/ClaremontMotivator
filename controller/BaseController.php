<?php

class BaseController
{
    /*
     * Deals with authentication state checking / redirecting / displaying message / view rendering
     * (includes a tiny template engine, for convenience, it is put in base controller.)
     */

    protected $view_params = [];
    // protected $BASE_VIEW_PATH = '/../view/base_layout.php';
    protected $BASE_VIEW_PATH;

    function __construct()
    {
        $this->BASE_VIEW_PATH = dirname(__FILE__) . '/../view/base_layout.php';
    }
    
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

        function view_param_raw($param_name)
        {
            global $view_params;
            return @$view_params[$param_name];
        }

        function get_link($controller, $action)
        {
            return "/?controller=$controller&action=$action";
        }

        // render $template_file_path to global variable $content_html
        ob_start();
        require dirname(__FILE__) . '/../view/' . $template_file_path . '.php';
        // require '/view/' . $template_file_path . '.php';
        global $content_html;
        $content_html = ob_get_clean();


        // export for BASE_VIEW to call
        function render_content()
        {
            global $content_html;
            echo $content_html;
        }

        // flash message, usually success messages
        function session_message()
        {
            $message = @$_SESSION['message'];
            if ($message) {
                echo '<div class="alert alert-info">' . $message . '</div>';
                $_SESSION['message'] = null;
            }
        }


        // render and show BASE_VIEW
        require $this->BASE_VIEW_PATH;
        die();
    }

    public function showErrorAndTerminate($error_message)
    {
        $this->setViewParam('title', 'Error');
        $this->setViewParam('error_message', $error_message);
        $this->renderView('message/custom_error');
    }

    protected function requiresLogin()
    {
        // checks log in state, if not logged in, redirect to log in page.
        if (!@$_SESSION['user_id']) {
            $this->redirect('auth', 'login');
        }
    }

    /**
     * @return User
     */
    protected function getCurrentUser()
    {
        if (!@$_SESSION['user_id']) {
            return null;
        }
        return User::find($_SESSION['user_id']);
    }

    protected function redirect($controller, $action)
    {
        header("Location: /?controller=$controller&action=$action");
        die();
    }
}