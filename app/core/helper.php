<?php

    Class Helper {

        public function __construct() { }

        public function load($helper) {
            $helperName = $helper . 'Helper';
            $fileName = str_replace('\\', '/', $helperName);
            $fileAddr = DIR_HELPER . '/' . $fileName . '.php';

            if (is_readable($fileAddr)) {
                require $fileAddr;
                return true;
            } else {
                return false;
            }

        }

    }

/* path: ~app/core/helper.php */