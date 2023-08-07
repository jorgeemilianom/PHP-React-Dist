<?php
class Builder
{
    const USE_PRE_BUILD = false;

    public function __construct()
    {
        $sourceDir = 'dist';    // Define the origin folder ('dist') and the destination folder (project root)
        $destinationDir = '.';  // Define the destination folder (root of the project)

        if (!is_dir($sourceDir)) {
            if(self::USE_PRE_BUILD){
                die("No hay un Dist React disponible");
            }
            header('Location: index.html');
            die;
        }

        $this->copyFilesToRoot($sourceDir, $destinationDir);    // We move the content of the 'Dist' folder to the project root
        $this->removePathsAbsolute();   // We eliminate the absolute paths of the 'Index.html' file

        header('Location: index.html');
    }

    private function copyFilesToRoot(string $sourceDir, string $destinationDir): void
    {
        try {
            if (!is_dir($destinationDir)) {
                mkdir($destinationDir, 0755, true);
            }

            $files = scandir($sourceDir);

            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    $sourceFile = $sourceDir . '/' . $file;
                    $destinationFile = $destinationDir . '/' . $file;

                    if (is_dir($sourceFile)) {
                        $this->copyFilesToRoot($sourceFile, $destinationFile);   // If it is a folder, recursively copy its content
                    } else {
                        copy($sourceFile, $destinationFile);    // If it's a file, copy it to destination
                    }
                }
            }
        } catch (\Throwable $th) {
            die("Error: " . $th->getMessage());
        }
    }

    private function removePathsAbsolute(): void
    {
        $archivoHTML = 'index.html';    // HTML file route you want to modify

        $contenido = file_get_contents($archivoHTML);   // Read the content of the file

        $contenidoModificado = str_replace('/assets', './assets', $contenido);  // Perform replacement

        file_put_contents($archivoHTML, $contenidoModificado);  // Save the changes in the file
    }

    
}

(new Builder);
