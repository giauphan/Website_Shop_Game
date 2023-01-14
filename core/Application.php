<?php

namespace Core;

use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Dotenv\Dotenv;

class Application
{
    protected Router $router;

    protected Request $request;

    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request();

        $this->loadEnvironment();
        $this->connectToDatabase();
    }

    public static function run(): void
    {
        echo Router::check_uri_method();
    }

    protected function connectToDatabase(): void
    {
        $capsule = new Manager();

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }

    protected function loadEnvironment(): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../.env');
    }
}