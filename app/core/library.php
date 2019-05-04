<?php

    Class Library {

        private $c;

        public function __construct($container) {
            $this->c = $container;
        }

        public function load($library) {
            $className = str_replace('\\', '/', $library);
            $libraryName = $library . 'Library';
            $classAddr = DIR_LIB . '/' . $className . '/' . $libraryName . '.php';

            if (is_readable($classAddr))
                require $classAddr;

            $this->c[$libraryName] = new $libraryName($this->c);
            return $this->c[$libraryName];
        }

    }

/* path: ~app/core/library.php */