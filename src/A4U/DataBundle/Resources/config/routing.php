<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('a4_u_data_homepage', new Route('/hello/{name}', array(
    '_controller' => 'A4UDataBundle:Default:index',
)));

return $collection;
