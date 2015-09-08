<?php

/**
 * class related to faculty view
 */
final class adminview {

    const DEFAULT_PAGE = 'adminhome';
    const PAGE_DIR = 'admin/';
    const LAYOUT_DIR = 'admin/';


    /**
     * System config.
     */
    
    public function init() {
        // error reporting - all errors for development (ensure you have display_errors = On in your php.ini file)
        session_start();
    }

    /**
     * Run the application!
     */
    public function run() {
        $this->runPage($this->getPage());
    }


    private function getPage() {
        $page = self::DEFAULT_PAGE;
        if (array_key_exists('page', $_GET)) {
            $page = $_GET['page'];
        }
        return $this->checkPage($page);
    }

    private function checkPage($page) {
        /*if (!preg_match('/^[a-z0-9-]+$/i', $page)) {
            // TODO log attempt, redirect attacker, ...
            throw new NotFoundException('Unsafe page "' . $page . '" requested');
        }
        if (!$this->hasScript($page) && !$this->hasTemplate($page)) {
            // TODO log attempt, redirect attacker, ...
            throw new NotFoundException('Page "' . $page . '" not found');
        }
         * 
         */
        return $page;
    }

    private function runPage($page, array $extra = array()) {
        $run = false;
        if ($this->hasScript($page)) {
            $run = true;
            require $this->getScript($page);
        }
        if ($this->hasTemplate($page)) {
            $run = true;
            // data for main template
            $template = $this->getTemplate($page);
            
            // main template (layout)
            require self::LAYOUT_DIR . 'adminlay.phtml';
        }
        if (!$run) {
            die('Page "' . $page . '" has neither script nor template!');
        }
    }

    private function getScript($page) {
        return self::PAGE_DIR . $page . '.php';
    }

    private function getTemplate($page) {
        return self::PAGE_DIR . $page . '.phtml';
    }

    private function hasScript($page) {
        return file_exists($this->getScript($page));
    }

    private function hasTemplate($page) {
        return file_exists($this->getTemplate($page));
    }

}

$index = new adminview();
$index->init();
// run application!
$index->run();

?>
