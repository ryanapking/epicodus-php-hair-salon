<?php
    class Stylist
    {
        private $id;
        private $name;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->id};");
            $clients = Client::findByStylistId($this->id);
            foreach ($clients as $client) {
                $client->delete();
            }
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$this->name}' WHERE id = {$this->id};");
        }

    //Static functions
        static function getAll()
        {
            $stylist_objects = array();
            $stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            foreach ($stylists as $stylist) {
                $name = $stylist['name'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $id);
                array_push($stylist_objects, $new_stylist);
            }
            return $stylist_objects;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM stylists;");
        }

        static function find($search_id)
        {
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                if ($stylist->getId() == $search_id) {
                    return $stylist;
                }
            }
        }

    //Getters and Setters
        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getId()
        {
            return $this->id;
        }
    }
 ?>
