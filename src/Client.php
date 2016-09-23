<?php
    class Client
    {
        private $id;
        private $name;
        private $stylist_id;

        function __construct($name, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->name}', {$this->stylist_id});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {

        }

        function update()
        {

        }

    //Static functions
        static function getAll()
        {
            $client_objects = array();
            $clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            foreach ($clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $stylist_id, $id);
                array_push($client_objects, $new_client);
            }
            return $client_objects;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find()
        {

        }

    //Getters and setters
        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$this->name}' WHERE id = {$this->id};");
        }

        function getStylistId()
        {

        }

        function setStylistId()
        {

        }

        function getId()
        {

        }
    }
 ?>
