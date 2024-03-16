<?php
namespace Base\Eloquent;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

const CONNECTION_DEFAULT = 'default';
const CONNECTION_SECOND = 'second';

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => HOST,
    'database' => DB_NAME,
    'username' => USER,
    'password' => PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
], CONNECTION_DEFAULT);

//$capsule->addConnection([
//    'driver' => 'mysql',
//    'host' => HOST,
//    'database' => '',
//    'username' => '',
//    'password' => '',
//    'charset' => 'utf8',
//    'collation' => 'utf8_unicode_ci',
//    'prefix' => '',
//], CONNECTION_SECOND);



// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->addConnection(Base\Eloquent\CONNECTION_DEFAULT->enableQueryLog());

/*function PrintLog() 
{
    echo '<pre>';
    foreach ([CONNECTION_DEFAULT, CONNECTION_SECOND] as $name) {
        $log = Capsule::connection($name)->getQueryLog();
        foreach ($log as $elem) {
            echo $name . ':' . 0.1 * $elem['time'] . ':' . $elem['query'] . 'bind: '. json_encode($elem['bindings']) . '</br>';
        }
    }
    echo '</pre>';
}*/

