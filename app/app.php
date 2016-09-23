<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Client.php';
    require_once __DIR__.'/../src/Stylist.php';

    $server = 'mysql:host=localhost;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app['debug'] = true;

    $app->get('/', function() use ($app) {
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/stylists', function() use ($app) {
        $name = $_POST['stylist_name'];
        $new_stylist = new Stylist($name);
        $new_stylist->save();
        return $app->redirect('/');
    });

    $app->delete('/stylists/stylist_id', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $stylist->delete();
        return $app->redirect('/');
    });

    $app->patch('/stylists/stylist_id', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $new_name = $_POST['new_name'];
        $stylist->setName($new_name);
        return $app->redirect('/');
    });

    return $app;
 ?>
