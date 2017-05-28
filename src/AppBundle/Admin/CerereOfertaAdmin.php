<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class CerereOfertaAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')->add('email');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $route = array('route' => array('name' => 'show'));
        $listMapper->addIdentifier('name', null, $route)->addIdentifier('prenume', null, $route)
            ->addIdentifier('email', null, $route);
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show->add('name')->add('prenume')->add('email')->add('tipul_produsului')->add('latime')
            ->add('inaltime')->add('culoare')->add('deschidere')->add('cantitate')->add('alte_specificatii');
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