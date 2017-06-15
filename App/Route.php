<?php
/**
 * Route: Destinado para as rotas do sistema
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace App;

use Micro\Initialization\Route as RouteInitialization;

class Route extends RouteInitialization
{

    /**
     * initRoutes: definição das rotas do sistema
     *
     * @return mixed
     */
    protected function initRoutes()
    {
        $routes['home'] = array('route'=>'/', 'controller'=>'indexController', 'action'=>'index');
        $routes['add'] = array('route'=>'/add', 'controller'=>'galleryController', 'action'=>'index');
        $routes['add-foto'] = array('route'=>'/add/photo', 'controller'=>'galleryController', 'action'=>'add');
        $routes['view'] = array('route'=>'/view', 'controller'=>'galleryController', 'action'=>'view');
        $routes['edit'] = array('route'=>'/edit', 'controller'=>'galleryController', 'action'=>'edit');
        $routes['edit-update'] = array('route'=>'/edit/update', 'controller'=>'galleryController', 'action'=>'update');
        $routes['delete'] = array('route'=>'/delete', 'controller'=>'galleryController', 'action'=>'delete');
        $this->setRoutes($routes);
    }
}
