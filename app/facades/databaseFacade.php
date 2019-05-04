<?php
namespace SlimFacades;

    Class Database Extends Facade {

        public static function self() {
            return self::$app->getContainer()->get('database');
        }

    }

/* path: ~app/facades/databaseFacade.php */