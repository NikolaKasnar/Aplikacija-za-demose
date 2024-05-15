<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class UputeController
{
    private $libraryService;

    public function __construct()
    {
        $this->libraryService = new LibraryService();
    }

    public function displayText()
    {
        error_log("displayText method is being executed.");
        $file_path = __DIR__ . '/../display_upute/snimanje_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if ($php_content !== false) {
            require_once 'view/upute/snimanje_html.php';
        } else {
            // Error: File nije nađen
        }
    }

    public function saveText()
    {
        $file_path = __DIR__ . '/../display_upute/snimanje_text.php';
        $content = $_POST['edited_content'];
        
        if ($this->libraryService->saveFileContent($file_path, $content)) {
            $php_content = $this->libraryService->getFileContent($file_path);
            require_once 'view/upute/snimanje_html.php';
            // File savean, prikaži promjenu i redirectaj na stranicu
        } else {
            // Error: File nije savean
        }
    }

    public function index()
    {
        require_once __DIR__ . '/../view/login/login_html.php';
    }

    public function aktuarski()
    {
        require_once __DIR__ . '/../view/upute/aktuarski_html.php';
    }

    public function doktorski()
    {
        require_once __DIR__ . '/../view/upute/doktorski_html.php';
    }

    public function praktikumi()
    {
        require_once __DIR__ . '/../view/upute/praktikumi_html.php';
    }

    public function printanje()
    {
        require_once __DIR__ . '/../view/upute/printanje_html.php';
    }

    public function snimanje()
    {
        $file_path = __DIR__ . '/../display_upute/snimanje_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if ($php_content !== false) {
            require_once 'view/upute/snimanje_html.php';
        } else {
            $php_content = $this->libraryService->getFileContent($file_path);
        }
    }

    public function snimanjedemosi()
    {
        require_once __DIR__ . '/../view/upute/snimanje-demosi_html.php';
    }
};
