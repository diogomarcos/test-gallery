<?php
/**
 * Action: Destinado para as execuções das ações
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace Micro\Controller;

use stdClass;

abstract class Action
{
    /** @var stdClass $view atributo para exibir a view */
    protected $view;

    // Atributo para receber a action
    private $action;

    /**
     * Action constructor.
     * Construtor para inicializar a classe pre-definida para a view
     */
    public function __construct()
    {
        $this->view = new stdClass();
    }

    /**
     * render: renderizar o conteúdo
     *
     * @param $action
     * @param bool $layout
     */
    protected function render($action, $layout = true)
    {
        $this->action = $action;

        if ($layout === true && file_exists('../App/Views/layout.phtml')) {
            include_once '../' . 'App/Views/layout.phtml';
        } else {
            $this->content();
        }
    }

    /**
     * content: exibir o conteúdo
     */
    protected function content()
    {
        $current = get_class($this);
        $singleClassName = strtolower(
            str_replace(
                'Controller',
                '',
                str_replace('App\\Controllers\\', '', $current)
            )
        );

        include_once '../App/Views/'.$singleClassName.'/'.$this->action.'.phtml';
    }
}
