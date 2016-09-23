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
            // Act
            $new_name = "Johnny B";
            $test_Client->setName($new_name);
            $result = $test_Client->getName();
            // Assert
            $this->assertEquals($new_name, $result);
        }

        function 
    }
 ?>
