<?php
namespace SlimFacades;

    Class Model Extends Facade {

        public static function self() {
            return self::$app->getContainer()->get('model');
        }

    }

/* path: ~app/facades/modelFacade.php */