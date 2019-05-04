<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use SlimFacades\Container;
use SlimFacades\Model;
use SlimFacades\View;
use SlimFacades\Library;
use SlimFacades\Helper;

    Class sampleController {

        private $c;

        public function __construct($container) {
            $this->c = $container;

            # with facade
            Model::load('sample');
            # or you can use like this;
            ## $this->c->model->load('sample');

            # with facade
            Library::load('sample');
            # or you can use like this;
            ## $this->c->library->load('sample');

            # with facade
            Helper::load('sample');
            # or you can use like this;
            ## $this->c->helper->load('sample');
        }

        public function viewTest(Request $request, Response $response, $args) {
            $params = [
                'name' => 'SlimMVC',
                'date' => date('Y-m-d H:i:s'),
            ];
            return View::render($response, 'sample.tpl', $params);
        }

        public function modelTest(Request $request, Response $response, $args) {
            # with facade
            $result = Container::get('sampleModel')->getProfileDetails(['id' => $args['id']]);
            # or you can use like this;
            ## $result = $this->c->sampleModel->getProfileDetails(['id' => 5]);
            var_dump($result);
        }

        public function libraryTest(Request $request, Response $response, $args) {
            # with facade
            $result = Container::get('sampleLibrary')->mathAddition(5, 10);
            # or you can use like this;
            ## $result = $this->c->sampleModel->mathAddition(5, 10);
            var_dump($result);
        }

        public function helperTest(Request $request, Response $response, $args) {
            $result = math_addition(5, 10);
            var_dump($result);
        }

        public function schemaTest(Request $request, Response $response, $args) {
            if (Database::schema()->hasTable('users') === false) {
                Database::schema()->create('users', function ($table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->string('email')->unique();
                    $table->string('password');
                    $table->string('userimage')->nullable();
                    $table->string('api_key')->nullable()->unique();
                    $table->rememberToken();
                    $table->timestamps();
                });
            }

            return $response->getBody()->write('Completed.');
        }
    }

/* path: ~app/controllers/sampleController.php */