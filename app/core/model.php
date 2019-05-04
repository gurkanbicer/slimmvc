<?php

    Class Model {

        protected $c;

        public function __construct($container) {
            $this->c = $container;
        }

        public function load($model) {
            $modelName = $model . 'Model';
            $className = str_replace('\\', '/', $modelName);
            $classAddr = DIR_MODEL . '/' . $className . '.php';

            if (is_readable($classAddr))
                require $classAddr;

            $this->c[$modelName] = new $modelName($this->c);
            return $this->c[$modelName];
        }

    }

/* path: ~app/core/model.php */