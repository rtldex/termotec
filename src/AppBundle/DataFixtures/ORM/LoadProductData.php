<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('Fereastra simpla fixa');
        $product->setWidth(700);
        $product->setHeight(1200);
        $product->setOpening('fara');
        $product->setColor('alba');
        $product->setPrice('152');
        $product->setStock(10);
        $product->setTip(ProductRepository::FERESTRE_SIMPLE);
        $product->setImagePath('/bundles/app/imgs/products/fsimpla_700_1200.jpg');

        $product2 = new Product();
        $product2->setName('Fereastra simpla fixa color');
        $product2->setWidth(700);
        $product2->setHeight(1200);
        $product2->setOpening('fara');
        $product2->setColor('wenghe');
        $product2->setPrice('198');
        $product2->setStock(10);
        $product2->setTip(ProductRepository::FERESTRE_SIMPLE);
        $product2->setImagePath('/bundles/app/imgs/products/fsimpla_700_1200_color.jpg');

        $product3 = new Product();
        $product3->setName('Fereastra dubla');
        $product3->setWidth(1200);
        $product3->setHeight(1200);
        $product3->setOpening('fixa + oscilobatanta');
        $product3->setColor('alba');
        $product3->setPrice('403');
        $product3->setStock(5);
        $product3->setTip(ProductRepository::FERESTRE_DUBLE);
        $product3->setImagePath('/bundles/app/imgs/products/fdubla_1200_1200.jpg');

        $product4 = new Product();
        $product4->setName('Fereastra dubla color');
        $product4->setWidth(1200);
        $product4->setHeight(1200);
        $product4->setOpening('fixa + oscilobatanta');
        $product4->setColor('wenghe');
        $product4->setPrice('514');
        $product4->setStock(5);
        $product4->setTip(ProductRepository::FERESTRE_DUBLE);
        $product4->setImagePath('/bundles/app/imgs/products/fdubla_1200_1200_color.jpg');

        $product5 = new Product();
        $product5->setName('Usa balcon simpla alba');
        $product5->setWidth(800);
        $product5->setHeight(1200);
        $product5->setOpening('batanta maner fals + blocaj');
        $product5->setColor('alba');
        $product5->setPrice('465');
        $product5->setStock(15);
        $product5->setTip(ProductRepository::USI_DE_BALCON);
        $product5->setImagePath('/bundles/app/imgs/products/usa_balcon_alb.jpg');

        $product6 = new Product();
        $product6->setName('Usa balcon simpla color');
        $product6->setWidth(800);
        $product6->setHeight(1200);
        $product6->setOpening('batanta maner fals + blocaj');
        $product6->setColor('wenghe');
        $product6->setPrice('596');
        $product6->setStock(7);
        $product6->setTip(ProductRepository::USI_DE_BALCON);
        $product6->setImagePath('/bundles/app/imgs/products/usa_balcon_color.jpg');

        $product7 = new Product();
        $product7->setName('Usa interior PVC model');
        $product7->setWidth(1000);
        $product7->setHeight(2100);
        $product7->setOpening('broasca + balamale');
        $product7->setColor('wenghe');
        $product7->setPrice('2175');
        $product7->setStock(6);
        $product7->setTip(ProductRepository::USI_DE_INTERIOR);
        $product7->setImagePath('/bundles/app/imgs/products/usa_interior_pvc_1.jpg');

        $product8 = new Product();
        $product8->setName('Usa interior PVC model');
        $product8->setWidth(1000);
        $product8->setHeight(2100);
        $product8->setOpening('broasca + balamale');
        $product8->setColor('nuc');
        $product8->setPrice('2235');
        $product8->setStock(7);
        $product8->setTip(ProductRepository::USI_DE_INTERIOR);
        $product8->setImagePath('/bundles/app/imgs/products/usa_interior_pvc_2.jpg');

        $product9 = new Product();
        $product9->setName('Poarta sectionala garaj cu telecomanda');
        $product9->setWidth(2500);
        $product9->setHeight(2500);
        $product9->setOpening('telecomanda - motor electric');
        $product9->setColor('alba');
        $product9->setPrice('3220');
        $product9->setStock(3);
        $product9->setTip(ProductRepository::PORTI_DE_GARAJ);
        $product9->setImagePath('/bundles/app/imgs/products/usa_garaj_alba.jpg');

        $product10 = new Product();
        $product10->setName('Glaf interior');
        $product10->setWidth(1000);
        $product10->setHeight(25);
        $product10->setOpening('');
        $product10->setColor('alb');
        $product10->setPrice('32');
        $product10->setStock(50);
        $product10->setTip(ProductRepository::GLAFURI);
        $product10->setImagePath('/bundles/app/imgs/products/glaf_pvc_interior_alb.jpg');

        $product11 = new Product();
        $product11->setName('Glaf exterior');
        $product11->setWidth(1000);
        $product11->setHeight(25);
        $product11->setOpening('');
        $product11->setColor('alb');
        $product11->setPrice('29');
        $product11->setStock(50);
        $product11->setTip(ProductRepository::GLAFURI);
        $product11->setImagePath('/bundles/app/imgs/products/glaf_pvc_exterior_alb.jpg');

        $product12 = new Product();
        $product12->setName('Rulou de aluminiu ');
        $product12->setWidth(700);
        $product12->setHeight(1200);
        $product12->setOpening('snur');
        $product12->setColor('alb');
        $product12->setPrice('253');
        $product12->setStock(20);
        $product12->setTip(ProductRepository::TEHNICA_PARASOLARA);
        $product12->setImagePath('/bundles/app/imgs/products/rulou_aluminiu_700_1200.jpg');

        $manager->persist($product);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);
        $manager->persist($product6);
        $manager->persist($product7);
        $manager->persist($product8);
        $manager->persist($product9);
        $manager->persist($product10);
        $manager->persist($product11);
        $manager->persist($product12);
        $manager->flush();
    }
}