<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use SlimFacades\Container;
use SlimFacades\Settings;

    Class Database Extends Capsule {

        public function __construct() {
            parent::__construct();
        }

        public function connectTo($configKey = "default", $connectionName = "") {
            try {
                if (empty($configKey)
                    or !is_string($configKey)
                    or $configKey == "")
                    throw new Exception('Database::connectTo - configKey parameter is wrong or empty.');

                if ($connectionName == ""
                    or !is_string($connectionName))
                    $connectionName = $configKey;

                $databaseConfig = Settings::get()['database'][$configKey];

                if (empty($databaseConfig)
                    or !is_array($databaseConfig))
                    throw new Exception('Database::connectTo - Database configuration variable is wrong or empty.');

                $this->addConnection($databaseConfig, $connectionName);
                $this->setAsGlobal();
                $this->bootEloquent();

                return $this;

            } catch (Exception $e) {
                Container::get('logger')->error($e->getMessage());
                return false;
            }
        }

        public function quickConnect($databaseConfig = [], $connectionName = "") {
            try {
                if (empty($databaseConfig)
                    or !is_array($databaseConfig))
                    throw new Exception('Database::connectTo - Database configuration variable is wrong or empty.');

                if ($connectionName == ""
                    or !is_string($connectionName))
                    $connectionName = $databaseConfig['database'];

                $this->addConnection($databaseConfig, $connectionName);
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