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

            // Spremanje texta
            if ($this->libraryService->saveFileContent($file_path, $content)) {
                $php_content = $this->libraryService->getFileContent($file_path);
            } else {
                $error_message = 'Greška u spremanju.';
            }

            // Spremanje svih text inputa osim prvog osnovnog
            /*if (!empty($_POST['additional_texts']) && !empty($_POST['file_names'])) {
                foreach ($_POST['additional_texts'] as $index => $additional_text) {
                    $file_name = $_POST['file_names'][$index];
                    $file_path = __DIR__ . '/../display_upute/' . $file_name;
                    $this->libraryService->saveFileContent($file_path, $additional_text);
                }
            }

            // Novi text inputa
            if (!empty($_POST['new_additional_texts'])) {
                $counter = count(glob(__DIR__ . '/../display_upute/doktorski_text_*.php')) + 1;
                foreach ($_POST['new_additional_texts'] as $new_text) {
                    $file_name = 'doktorski_text_' . $counter . '.php';
                    $file_path = __DIR__ . '/../display_upute/' . $file_name;
                    $this->libraryService->saveFileContent($file_path, $new_text);
                    $counter++;
                }
            }

            // Uplaod slika
            if (!empty($_FILES['additional_photos']['name'][0])) {
                $upload_dir = __DIR__ . '/../images/doktorski_upute/';
                foreach ($_FILES['additional_photos']['name'] as $key => $filename) {
                    if ($_FILES['additional_photos']['error'][$key] == UPLOAD_ERR_OK) {
                        $upload_file = $upload_dir . basename($filename);
                        if (move_uploaded_file($_FILES['additional_photos']['tmp_name'][$key], $upload_file)) {
                            $image_url = 'images/' . basename($filename);
                            $content .= '<img src="' . htmlspecialchars($image_url) . '" alt="Uploaded Image">';
                        }
                    }
                }
            }*/

            // RPonovno ucitamo formu
            require_once 'view/upute/doktorski_html.php';
        } else {
            require_once 'view/upute/doktorski_html.php';
        }
    }

    // Funkcija za brisanje filova koja se nije koristila na kraju
    /*public function deleteFile()
    {
        //echo "test";
        if (isset($_POST['file'])) {
            $file = basename($_POST['file']);
            echo "test";
            $file_path = __DIR__ . '/../display_upute/' . $file;

            if (file_exists($file_path) && unlink($file_path)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }*/

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
