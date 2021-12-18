<?php namespace neobcn;

class CiPsr4Namespaces
{
    /**
     * Almacenamos los namespaces como clave y los paths como valor.
     *
     * @var array
     */
    private $prefijos = [];

    /**
     * Almacenamos los nombres de las clases como clave y los paths como valor.
     *
     * @var array
     */
    private $mapaDeClases = [];


    public function inicializar()
    {
        // Registrar y devolver las extensiones de ficheros predeterminadas para spl_autoload;
        // php en primer lugar para mejoras de rendimiento.
        spl_autoload_extensions('.php,.inc');

        // Registrar las funciones dadas como implementación de __autoload()
        spl_autoload_register([$this, 'cargaClasePHP'], true, true);

        // Ahora anteponemos otro cargador, para los ficheros de nuestro mapa de clases.
        $config = is_array($this->mapaDeClases) ?? [];

        spl_autoload_register(function ($classe) use ($config) {
            $partes = explode("\\", $classe);
            $classe = end($parts);
            if (empty($config[$classe])){
                return false;
            }
            include_once $config[$classe];
        }, true,true);
    }

    private function cargaClasePHP($clase)
    {
        $ficheroMapeado = $this->cargaDesdeNamespaces($clase = str_ireplace('.php', '', trim($clase, '\\')));
        return $ficheroMapeado ?? $this->cargaDesdeDefaults($clase);
    }

    private function cargaDesdeNamespaces($clase)
    {
        if (strpos($class, '\\') === false){
            return false;
        }

        foreach ($this->prefijos as $namespace => $directorios){
            foreach ($directorios as $directorio){
                if (strpos($class, $namespace) === 0){
                    if ($filename = $this->requerirFichero(
                        rtrim($directorio, '/') .
                        str_replace('\\', '/',substr($class, strlen($namespace))) .
                        '.php')){
                        return $filename;
                    }
                }
            }
        }
        // No hemos encontrado el fichero.
        return false;
    }

    private function cargaDesdeDefaults($clase)
    {
        if (strpos($clase, '\\') !== false){
            return false;
        }
        $paths = [
            APPPATH . 'Controllers/',
            APPPATH . 'Libraries/',
            APPPATH . 'Models/',
        ];
        foreach ($paths as $path){
            if ($fichero = $this->requerirFichero($path . str_replace('\\', '/', $clase) . '.php')){
                return $fichero;
            }
        }
        // No hemos encontrado el fichero.
        return false;
    }

    private function requerirFichero($fichero)
    {
        $file = $this->sanitizeFilename($file);

        if (is_file($fichero = preg_replace('/[^0-9\p{L}\s\/\-\_\.\:\\\\]/u', '', trim($fichero, '.-_')))) {
            require_once $fichero;
            return $fichero;
        }
        // No hemos encontrado el fichero.
        return false;
    }
}
