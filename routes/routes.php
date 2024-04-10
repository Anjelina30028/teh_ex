<?php

namespace routes\routes;

use routes\Router\Router;
use utils\Connect\Connect;

Router::addPage('/', 'home');

Router::Post('/add', Connect::class, 'add');
Router::Post('/delete', Connect::class, 'delete');

Router::Content();