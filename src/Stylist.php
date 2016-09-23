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

        static function find()
        {

        }
    //Getters and Setters
        function getName()
        {

        }

        function setName()
        {

        }

        function getId()
        {

        }
    }
 ?>
