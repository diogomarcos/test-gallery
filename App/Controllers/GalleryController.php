<?php
/**
 * GalleryController: Destinado para as ações da gallery
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace App\Controllers;

use App\Models\Gallery;
use Micro\Controller\Action;
use Micro\DependencyInjection\Container;

class GalleryController extends Action
{
    /**
     * index: exibe o formulário para adicionar uma nova foto
     */
    public function index()
    {
        $this->render('add');
    }

    /**
     * add: verifica as informações para que a foto seja salva
     */
    public function add()
    {
        if (isset($_POST['submit_photo'])) {
            $title_photo = $_POST['title_photo'];
            $name_photo = $_FILES['file_photo']['name'];
            $temp_photo = $_FILES['file_photo']['tmp_name'];
            $size_photo = $_FILES['file_photo']['size'];
            $type_photo = $_FILES['file_photo']['type'];

            if (in_array($type_photo, Gallery::getTypePhoto(), true)) {
                $name_photo = str_replace(' ', '-', $name_photo);
                $name_photo = date('d-m-Y_H-i-s') . '_' . $name_photo;
                copy($temp_photo, "images/$name_photo");

                /** @var Gallery $gallery */
                $gallery = Container::getModel('Gallery');
                $this->view->photo = $gallery->add($title_photo, $name_photo);

                if($this->view->photo > 0) {
                    $_SESSION['message'] = 'Foto inserida com sucesso!';
                    $_SESSION['type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Não foi possível inserir a foto!';
                    $_SESSION['type'] = 'danger';
                }
            } else {
                $_SESSION['message'] = 'O arquivo escolhido não corresponde a uma foto!';
                $_SESSION['type'] = 'danger';
            }
        }

        header('location: ' . '/add');
    }

    /**
     * view: exibe todas as fotos em formato de lista com as ações de excluir e editar
     */
    public function view()
    {
        /** @var Gallery $gallery */
        $gallery = Container::getModel('Gallery');
        $this->view->photos = $gallery->fetchAll();
        $this->render('view');
    }

    /**
     * edit: exibe o formulário para atualizar a foto
     */
    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            /** @var Gallery $gallery */
            $gallery = Container::getModel('Gallery');
            $this->view->photo = $gallery->find($id);

            if ($this->view->photo) {
                $this->render('edit');
            } else {
                header('location: ' . '/view');
            }
        } else {
            header('location: ' . '/view');
        }
    }

    /**
     * update: verifica as informações para que a foto seja atualizada
     */
    public function update()
    {
        if (isset($_POST['submit_photo'])) {
            $id_photo = $_POST['id_photo'];
            $file_old_photo = $_POST['file_old_photo'];

            $title_photo = $_POST['title_photo'];
            $name_photo = $_FILES['file_photo']['name'];
            $temp_photo = $_FILES['file_photo']['tmp_name'];
            $size_photo = $_FILES['file_photo']['size'];
            $type_photo = $_FILES['file_photo']['type'];

            if (in_array($type_photo, Gallery::getTypePhoto(), true)) {
                $name_photo = str_replace(' ', '-', $name_photo);
                $name_photo = date('d-m-Y_H-i-s') . '_' . $name_photo;
                copy($temp_photo, "images/$name_photo");

                /** @var Gallery $gallery */
                $gallery = Container::getModel('Gallery');
                $this->view->photo = $gallery->update($id_photo, $title_photo, $name_photo);

                if($this->view->photo > 0) {
                    unlink("images/$file_old_photo");

                    $_SESSION['message'] = 'Foto atualizada com sucesso!';
                    $_SESSION['type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Não foi possível atualizar a foto!';
                    $_SESSION['type'] = 'danger';
                }
            } else {
                $_SESSION['message'] = 'O arquivo escolhido não corresponde a uma foto!';
                $_SESSION['type'] = 'danger';
            }
        }

        header('location: ' . '/view');
    }

    /**
     * delete: verifica as informações para que a foto seja excluida
     */
    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            /** @var Gallery $gallery */
            $gallery = Container::getModel('Gallery');
            $this->view->photo = $gallery->find($id);
            $this->view->photo_delete = $gallery->delete($id);

            if($this->view->photo_delete > 0) {
                unlink('images/'.$this->view->photo['name']);

                echo 'Foto excluída com  sucesso!';
            } else {
                echo 'Ocorreu um erro ao excluir a foto!';
            }
        } else {
            header('location: ' . '/view');
        }
    }
}
