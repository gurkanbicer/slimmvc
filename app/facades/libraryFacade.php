<?php
namespace SlimFacades;

    Class Library Extends Facade {

        public static function self() {
            return self::$app->getContainer()->get('library');
        }

    }

/* path: ~app/facades/libraryFacade.php */