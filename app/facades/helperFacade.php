<?php
namespace SlimFacades;

    Class Helper Extends Facade {

        public static function self() {
            return self::$app->getContainer()->get('helper');
        }

    }

/* path: ~app/facades/helperFacade.php */