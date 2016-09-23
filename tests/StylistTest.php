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

        function test_Save()
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
    }
 ?>
