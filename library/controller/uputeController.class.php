<?php

require_once __DIR__ . '/../model/libraryservice.class.php';

class UputeController
{
    private $libraryService;

    public function __construct()
    {
        $this->libraryService = new LibraryService();
    }
    
    public function index()
    {
        require_once __DIR__ . '/../view/login/login_html.php';
    }

    public function aktuarski()
    {
        $file_path = __DIR__ . '/../display_upute/aktuarski_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/aktuarski_html.php';
            } else {
                require_once 'view/upute/aktuarski_html.php';
            }
        } else {
            require_once 'view/upute/aktuarski_html.php';
        }
    }

    public function aktuarskidemosi()
    {
        require_once __DIR__ . '/../view/upute-demosi/aktuarski-demosi_html.php';
    }

    public function doktorski()
    {
        $file_path = __DIR__ . '/../display_upute/doktorski_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/doktorski_html.php';
            } else {
                require_once 'view/upute/doktorski_html.php';
            }
        } else {
            require_once 'view/upute/doktorski_html.php';
        }
    }

    public function doktorskidemosi()
    {
        require_once __DIR__ . '/../view/upute-demosi/doktorski-demosi_html.php';
    }

    public function praktikumi()
    {
        $file_path = __DIR__ . '/../display_upute/praktikumi_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/praktikumi_html.php';
            } else {
                require_once 'view/upute/praktikumi_html.php';
            }
        } else {
            require_once 'view/upute/praktikumi_html.php';
        }
    }

    public function praktikumidemosi() 
    {
        require_once __DIR__ . '/../view/upute-demosi/praktikumi-demosi_html.php';
    }

    public function printanje()
    {
        $file_path = __DIR__ . '/../display_upute/printanje_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/printanje_html.php';
            } else {
                require_once 'view/upute/printanje_html.php';
            }
        } else {
            require_once 'view/upute/printanje_html.php';
        }
    }

    public function printanjedemosi()
    {
        require_once __DIR__ . '/../view/upute-demosi/printanje-demosi_html.php';
    }

    public function snimanje()
    {
        $file_path = __DIR__ . '/../display_upute/snimanje_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/snimanje_html.php';
            } else {
                require_once 'view/upute/snimanje_html.php';
            }
        } else {
            require_once 'view/upute/snimanje_html.php';
        }
    }

    public function snimanjedemosi()
    {
        require_once __DIR__ . '/../view/upute-demosi/snimanje-demosi_html.php';
    }

    public function opisposla()
    {
        $file_path = __DIR__ . '/../display_upute/opisposla_text.php';
        $php_content = $this->libraryService->getFileContent($file_path);

        if (isset($_POST['edited_content'])) {
            $content = $_POST['edited_content'];

            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
                require_once 'view/upute/opisposla-admin_html.php';
            } else {
                require_once 'view/upute/opisposla-admin_html.php';
            }
        } else {
            require_once 'view/upute/opisposla-admin_html.php';
        }
    }

    public function opisposlademosi()
    {
        require_once __DIR__ . '/../view/login/opisposla_html.php';
    }
};
