<?php
/**
 * Route: Destinado para as rotas do sistema
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace Micro\Initialization;

abstract class Route
{
    /** @var array $routes */
    private $routes;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    /**
     * initRoutes: definição das rotas do sistema
     *
     * @return mixed
     */
    abstract protected function initRoutes();

    /**
     * run: encontra a rota existente e executa a lógica definida
     *
     * @param string $url
     */
    protected function run($url)
    {
        array_walk($this->routes, function ($routes) use ($url) {
            if ($url === $routes['route']) {
                $class = "App\\Controllers\\".ucfirst($routes['controller']);
                $controller = new $class;
                $action = $routes['action'];
                $controller->$action();
            }
        });
    }

    /**
     * @param array $routes
     */
    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @return mixed
     */
    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
