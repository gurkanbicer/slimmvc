<?php

    Class SampleLibrary {

        private $c;

        public function __construct($container) {
            $this->c = $container;
        }

        public function mathAddition($a, $b) {
            return $a + $b;
        }

    }

/* path: ~app/libraries/sample/sampleLibrary.php */