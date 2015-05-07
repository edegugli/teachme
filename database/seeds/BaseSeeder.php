<?php
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: edegugli
 * Date: 06/05/15
 * Time: 09:11 PM
 */

abstract class BaseSeeder extends Seeder {

    protected function createMultiple($total)
    {
        for ($i = 0; $i < $total; $i++) {
            $this->create();
        }
    }

    public abstract function getModel();
    public abstract function getDummyData(Generator $faker, array $customValues=array());

    protected function create(array $customValues=array())
    {
        $values = $this->getDummyData(Faker::create(), $customValues);
        $values = array_merge($values,$customValues);
        $this->getModel()->create($values);
    }

}