<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class ContactAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('first_name')->add('last_name')->add('email');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $route = array('route' => array('name' => 'show'));
        $listMapper->addIdentifier('first_name', null, $route)->addIdentifier('last_name', null, $route)
            ->addIdentifier('email', null, $route);
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('first_name')->add('last_name')->add('email')->add('subject');
    }

    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);
        unset($list['create']);
        unset($list['edit']);
        $list['delete'] = array('template' => 'SonataAdminBundle:Button:delete_button.html.twig');
        return $list;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create')->remove('edit');
    }
}