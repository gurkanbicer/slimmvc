<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use SlimFacades\Container;
use SlimFacades\Settings;

    Class Database Extends Capsule {

        public function __construct() {
            parent::__construct();
        }

        public function connectTo($database = "default") {
            try {
                if (empty($database))
                    throw new Exception(0);

                $info = Settings::get()['database'][$database];

                if (empty($info) || !is_array($info))
                    throw new Exception('Database configuration variable is empty or isn\'t an array.');

                $this->addConnection($info);
                $this->setAsGlobal();
                $this->bootEloquent();

                return $this;

            } catch (Exception $e) {
                Container::get('logger')->error($e->getMessage());
                return false;
            }
        }

        public function quickConnect($info = []) {
            try {
                if (empty($info) || !is_array($info))
                    throw new Exception('Database configuration variable is empty or isn\'t an array.');

                $this->addConnection($info);
                $this->setAsGlobal();
                $this->bootEloquent();

                return $this;

            } catch (Exception $e) {
                Container::get('logger')->error($e->getMessage());
                return false;
            }
        }

    }

/* path: ~app/core/database.php */