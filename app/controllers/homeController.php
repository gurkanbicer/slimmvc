<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use SlimFacades\View;

    Class homeController {

        private $c;

        public function __construct($container) {
            $this->c = $container;
        }

        public function index(Request $request, Response $response, $args) {
            $composer = file_get_contents(DIR_APP . '/composer.json');
            return View::render($response, 'index.tpl', ['composer' => $composer, 'version' => VERSION]);
        }

    }

/* path: ~app/controllers/homeController.php */