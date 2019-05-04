<?php
use SlimFacades\Database;

    Class sampleModel {

        private $c;

        public function __construct($container) {
            $this->c = $container;
            Database::connectTo('default');
        }

        public function getProfileDetails($params = []) {
            try {
                if (!isset($params['id']))
                    throw new Exception('id parameter is empty.');

                $profileDetails = Database::table('users')
                    ->where('id', '=', $params['id'])
                    ->get();

                return $profileDetails;

            } catch (Exception $e) {
                return [];
            }

        }
    }

/* path: ~app/models/sampleModel.php */