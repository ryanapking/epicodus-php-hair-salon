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

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

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

    $app->delete('/stylists/{stylist_id}', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $stylist->delete();
        return $app->redirect('/');
    });

    $app->get('/clients/{stylist_id}', function($stylist_id) use ($app) {
        $clients = Client::findByStylistId($stylist_id);
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('clients.html.twig', array('clients' => $clients, 'stylist' => $stylist));
    });

    $app->post('/clients/{stylist_id}', function($stylist_id) use ($app) {
        $name = $_POST['client_name'];
        $new_client = new Client($name, $stylist_id);
        $new_client->save();
        return $app->redirect('/clients/' . $stylist_id);
    });

    $app->get('/client_edit/{client_id}', function($client_id) use ($app) {
        $client = Client::find($client_id);
        $stylists = Stylist::getAll();
        return $app['twig']->render('client_edit.html.twig', array('client' => $client, 'stylists' => $stylists));
    });

    $app->patch('/client_edit/{client_id}', function($client_id) use ($app) {
        $client = Client::find($client_id);
        $new_client_name = $_POST['new_client_name'];
        $client->setName($new_client_name);
        $new_stylist_id = $_POST['new_stylist_id'];
        $client->setStylistId($new_stylist_id);
        $client->update();
        return $app->redirect('/client_edit/' . $client->getId());
    });

    $app->delete('/client_edit/{client_id}', function($client_id) use ($app) {
        $client = Client::find($client_id);
        $client->delete();
        return $app->redirect('/clients/' . $client->getStylistId());
    });

    $app->get('/stylist_edit/{stylist_id}', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist_edit.html.twig', array('stylist' => $stylist));
    });

    $app->patch('/stylist_edit/{stylist_id}', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $new_stylist_name = $_POST['new_stylist_name'];
        $stylist->setName($new_stylist_name);
        $stylist->update();
        return $app->redirect('/stylist_edit/' . $stylist->getId());
    });

    $app->delete('/stylist_edit/{stylist_id}', function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $stylist->delete();
        return $app->redirect('/');
    });

    return $app;
 ?>
