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

        function test_deleteAll()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            $input_name2 = "Thomas";
            $test_Stylist2 = new Stylist($input_name2);
            $test_Stylist2->save();
            // Act
            Stylist::deleteAll();
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([], $result);
        }

        function test_getAll()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            $input_name2 = "Thomas";
            $test_Stylist2 = new Stylist($input_name2);
            $test_Stylist2->save();
            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_find()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            $input_name2 = "Thomas";
            $test_Stylist2 = new Stylist($input_name2);
            $test_Stylist2->save();
            $find_id = $GLOBALS['DB']->lastInsertId();
            // Act
            $result = Stylist::find($find_id);
            // Assert
            $this->assertEquals($test_Stylist2, $result);
        }

        function test_delete()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            $input_name2 = "Thomas";
            $test_Stylist2 = new Stylist($input_name2);
            $test_Stylist2->save();
            // Act
            $test_Stylist->delete();
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([$test_Stylist2], $result);
        }

        function test_update()
        {
            // Arrange
            $input_name = "Rebecca";
            $test_Stylist = new Stylist($input_name);
            $test_Stylist->save();
            $new_name = "Rebeca";
            $test_Stylist->setName($new_name);
            // Act
            $test_Stylist->update();
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals([$test_Stylist], $result);
        }

        function test_delete_withClients()
        {
            // Arrange
            $stylist_name = "Rebecca";
            $test_Stylist = new Stylist($stylist_name);
            $test_Stylist->save();
            $stylist_id = $test_Stylist->getId();
            $test_Client = new Client("Bill", $stylist_id);
            $test_Client->save();
            // Act
            $test_Stylist->delete();
            $result = Client::findByStylistId($stylist_id);
            // Assert
            $this->assertEquals([], $result);
        }
    }
 ?>
