<?php
/**
 * Created by PhpStorm.
 * User: zak956
 * Date: 03.07.16
 * Time: 18:23
 */

namespace CarsBundle\DataFixtures\ORM;


use CarsBundle\Entity\Car;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCarData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cars = [
            [
                'brand' => 'Audi',
                'model' => 'A6'
            ],
            [
                'brand' => 'BMW',
                'model' => '320'
            ],
            [
                'brand' => 'BMW',
                'model' => '760Li'
            ],
            [
                'brand' => 'Mercedes-Benz',
                'model' => 'E320'
            ],
            [
                'brand' => 'Mercedes-Benz',
                'model' => 'S500'
            ],
        ];

        foreach ($cars as $item) {
            $car = new Car();
            $car->setBrand($item['brand']);
            $car->setModel($item['model']);

            $manager->persist($car);
            $manager->flush();
        }
    }
}