<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    **/

    require_once 'src/Stylist.php';

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            // Act
            $test_Stylist->save();
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([$test_Stylist], $result);
        }

        function test_getName()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            // Act
            $test_Stylist->save();
            $result = $test_Stylist->getName();
            // Assert
            $this->assertEquals($input_name, $result);
        }

        function test_setName()
        {
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            // Act
            $new_name = "Rebeca";
            $test_Stylist->setName($new_name);
            $result = $test_Stylist->getName();
            // Assert
            $this->assertEquals($new_name, $result);
        }

        function test_getId()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            // Act
            $id = $GLOBALS['DB']->lastInsertId();
            $result = $test_Stylist->getId();
            // Assert
            $this->assertEquals($id, $result);
        }
    }
 ?>
