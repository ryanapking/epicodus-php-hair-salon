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
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->id};");
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$this->name}', stylist_id = {$this->stylist_id} WHERE id = {$this->id};");
        }

        function getStylistName()
        {
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                if ($stylist->getId() == $this->stylist_id) {
                    return $stylist->getName();
                }
            }
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

        static function find($search_id)
        {
            $clients = Client::getAll();
            foreach ($clients as $client) {
                if ($client->getId() == $search_id) {
                    return $client;
                }
            }
        }

        static function findByStylistId($search_stylist_id)
        {
            $found_clients = array();
            $clients = Client::getAll();
            foreach ($clients as $client) {
                if ($client->getStylistId() == $search_stylist_id) {
                    array_push($found_clients, $client);
                }
            }
            return $found_clients;
        }

    //Getters and setters
        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function getId()
        {
            return $this->id;
        }
    }
 ?>
