<?php
/**
 * IndexController: Destinado para as ações do index (home)
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace App\Controllers;

use App\Models\Gallery;
use Micro\Controller\Action;
use Micro\DependencyInjection\Container;

class IndexController extends Action
{
    /**
     * index: exibe todas as fotos em formato de galeria na página inícial
     */
    public function index()
    {
        /** @var Gallery $gallery */
        $gallery = Container::getModel('Gallery');
        $this->view->photos = $gallery->fetchAll();
        $this->render('index');
    }
}
