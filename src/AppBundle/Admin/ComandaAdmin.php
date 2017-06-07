<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class ComandaAdmin extends AbstractAdmin
{

    protected function configureListFields(ListMapper $listMapper)
    {
        $route = array('route' => array('name' => 'show'));
        $listMapper->addIdentifier('user', null, $route);
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('user')->add('items')->add('total');
    }

    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);
        unset($list['create']);
        unset($list['edit']);
        $list['delete'] = array('template' => 'AppBundle:Admin:delete_button.html.twig');
        return $list;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create')->remove('edit');
    }
}