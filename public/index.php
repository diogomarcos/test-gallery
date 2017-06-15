<?php
/**
 * index
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

session_start();

use App\Models\Gallery;
use App\Route;
use Micro\DependencyInjection\Container;

require_once __DIR__.'/../vendor/autoload.php';

/** @var Gallery $gallery */
$gallery = Container::getModel('Gallery');
$gallery->createTable();

$route = new Route();
