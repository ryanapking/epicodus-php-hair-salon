<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    **/

    require_once 'src/Client.php';
    require_once 'src/Stylist.php';

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            // Act
            $test_Client->save();
            $result = Client::getAll();
            // Assert
            $this->assertEquals([$test_Client], $result);
        }

        function test_getName()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            // Act
            $result = $test_Client->getName();
            // Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $saved_Client = Client::find($test_Client->getId());
            // Act
            $new_name = "Johnny B";
            $test_Client->setName($new_name);
            $result = Client::find($test_Client->getId())->getName();
            // Assert
            $this->assertEquals($new_name, $result);
        }

        function test_getStylistId()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            // Act
            $result = $test_Client->getStylistId();
            // Assert
            $this->assertEquals($stylist_id, $result);
        }

        function test_setStylistId()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            // Act
            $new_stylist_id = 9;
            $test_Client->setStylistId($new_stylist_id);
            $result = Client::find($test_Client->getId())->getStylistId();
            // Assert
            $this->assertEquals($new_stylist_id, $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $name2 = "Nancy";
            $stylist_id2 = 4;
            $test_Client2 = new Client($name2, $stylist_id2);
            $test_Client2->save();
            // Act
            Client::deleteAll();
            $result = Client::getAll();
            // Assert
            $this->assertEquals([], $result);
        }

        function test_getAll()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $name2 = "Nancy";
            $stylist_id2 = 4;
            $test_Client2 = new Client($name2, $stylist_id2);
            $test_Client2->save();
            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals([$test_Client, $test_Client2], $result);
        }

        function test_find()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $name2 = "Nancy";
            $stylist_id2 = 4;
            $test_Client2 = new Client($name2, $stylist_id2);
            $test_Client2->save();
            // Act
            $find_id = $test_Client2->getId();
            $result = Client::find($find_id);
            // Assert
            $this->assertEquals($test_Client2, $result);
        }

        function test_delete()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $name2 = "Nancy";
            $stylist_id2 = 4;
            $test_Client2 = new Client($name2, $stylist_id2);
            $test_Client2->save();
            // Act
            $test_Client->delete();
            $result = Client::getAll();
            // Assert
            $this->assertEquals([$test_Client2], $result);
        }

        function test_findByStylistId()
        {
            // Arrange
            $name = "John";
            $stylist_id = 8;
            $test_Client = new Client($name, $stylist_id);
            $test_Client->save();
            $name2 = "Nancy";
            $stylist_id2 = 4;
            $test_Client2 = new Client($name2, $stylist_id2);
            $test_Client2->save();
            $name3 = "Paul";
            $stylist_id3 = 4;
            $test_Client3 = new Client($name3, $stylist_id3);
            $test_Client3->save();
            // Act
            $stylist_search_id = $test_Client2->getStylistId();
            $result = Client::findByStylistId($stylist_search_id);
            // Assert
            $this->assertEquals([$test_Client2, $test_Client3], $result);
        }

        function test_getStylistName()
        {
            // Arrange
            $stylist_name = "Anne";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $client_name = "Frank";
            $test_Client = new Client($client_name, $stylist_id);
            $test_Client->save();
            // Act
            $result = $test_Client->getStylistName();
            // Assert
            $this->assertEquals($stylist_name, $result);
        }
    }
 ?>
