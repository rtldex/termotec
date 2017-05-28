<?php

namespace AppBundle\Admin;

use AppBundle\Repository\ProductRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProductAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name')->add('width')->add('height')->add('opening')->add('color')->add('price')->add('stock')
            ->add('tip', ChoiceType::class, array(
                'choices' => array(
                    'Fereastra simpla' => ProductRepository::FERESTRE_SIMPLE,
                    'Fereastra dubla' => ProductRepository::FERESTRE_DUBLE,
                    'Usi de balcon' => ProductRepository::USI_DE_BALCON,
                    'Usi de interior' => ProductRepository::USI_DE_INTERIOR,
                    'Glafuri' => ProductRepository::GLAFURI,
                    'Porti de garaj' => ProductRepository::PORTI_DE_GARAJ,
                    'Tehnica parasolara' => ProductRepository::TEHNICA_PARASOLARA,
                ),
            ))
            ->add('image_path');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')->addIdentifier('width');
    }
}