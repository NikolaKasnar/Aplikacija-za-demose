<?php

require_once __DIR__ . '/userModel.php';

class LibraryService
{
    public function getFileContent($file_path)
    {
        if (file_exists($file_path)) {
            return file_get_contents($file_path);
        } else {
            return false;
        }
    }

    public function saveFileContent($file_path, $content)
    {
        return file_put_contents($file_path, $content);
    }
    /*
    public function displayText($file_path)
    {
        $php_content = $this->getFileContent($file_path);
        return $php_content !== false ? $php_content : false;
    }

    public function saveText($file_path, $content)
    {
        return $this->saveFileContent($file_path, $content);
    }
    */
}
?>