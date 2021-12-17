<?php

/**
 * Class View
 */
class View {

    private $template;

    /**
     * View constructor.
     * @param null $template
     */
    public function __construct($template = null) {
        $this->template = $template;
    }

    /**
     * @param array $data
     */
    public function render($data = [], $gabarit = "home") {
        $template = $this->template;

        if ($gabarit != false) {
            ob_start();
            include(VIEWS.$template.'.php');
            $contentPage = ob_get_clean();
            include(VIEWS.'_gabarit.'.$gabarit.'.php');
        } else {
            include(VIEWS.$template.'.php');
        }
    }

    /**
     * @param $route
     */
    public function redirect($route) {
        header('Location: '.HOST.'/index.php?page='.$route);
        exit();
    }
}