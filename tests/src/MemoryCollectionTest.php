<?php

//namespace Live\Collection;

//include ('../../src/MemoryCollection.php');

include 'C:/Users/Dênis Lima/Desktop/testeDenisPHP/php-test/src/MemoryCollection.php';

//include ('C:/xampp/php/PEAR');

//use PHPUnit\Framework\TestCase;

$obj = new MemoryCollectionTest();
echo $obj->dataCanBeAdded();
echo $obj->dataCanBeRetrieved();
class MemoryCollectionTest //extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function objectCanBeConstructed()
    {
        $collection = new MemoryCollection();
        return $collection;
    }

    /**
     * @test
     * @depends objectCanBeConstructed
     * @doesNotPerformAssertions
     */
    public function dataCanBeAdded()
    {
        $collection = new MemoryCollection();
        $collection->set('index1', 'value');
        $collection->set('index2', 5);
        $collection->set('index3', true);
        $collection->set('index4', 6.5);
        $collection->set('index5', ['data']);

        echo 'Informação adicionada.';
        //echo "$collection";

        print_r($collection);
    }

     /**
     * @test
     * @depends dataCanBeAdded
     */
    public function dataCanBeRetrieved()
    {
        echo 'MOSTRANDO INFORMAÇÃO NA COLEÇÃO:';

        $collection = new MemoryCollection();
        $collection->set('index1', 'value');

        $collection->get('index5');

        print_r($collection);
    }

    /**
     * @test
     * @depends objectCanBeConstructed
     */
    public function inexistentIndexShouldReturnDefaultValue()
    {
        $collection = new MemoryCollection();

        $collection->assertNull($collection->get('index1'));
        $collection->get('index1', 'defaultValue');
    }

    /**
     * @test
     * @depends objectCanBeConstructed
     */
    public function newCollectionShouldNotContainItems()
    {
        $collection = new MemoryCollection();
        $collection->clean();
    }

    /**
     * @test
     * @depends dataCanBeAdded
     */
    public function collectionWithItemsShouldReturnValidCount()
    {
        $collection = new MemoryCollection();
        $collection->set('index1', 'value');
        $collection->set('index2', 5);
        $collection->set('index3', true);

        $collection->get(3, $collection->count());
    }

    /**
     * @test
     * @depends collectionWithItemsShouldReturnValidCount
     */
    public function collectionCanBeCleaned()
    {
        $collection = new MemoryCollection();
        $collection->set('index', 'value');

        $collection->clean();
    }

    /**
     * @test
     * @depends dataCanBeAdded
     */
    public function addedItemShouldExistInCollection()
    {
        $collection = new MemoryCollection();
        $collection->set('index', 'value');

        $collection->has('index', 'value');
    }
}

