<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
  'debug' => true
));

$app->setName('blockmines-proxy');

//Routes
$app->get('/', 'home');

// API
$app->group('/api', function () use ($app) {

  # v1
  $app->group('/v1', function () use ($app) {

    $app->group('/ppc', function () use ($app) {
    	
			$app->get('/usd', 'ppc:usd');

			$app->get('/btc', 'ppc:btc');

    });

  });

});

$app->contentType('application/json');

# lets go
$app->run();

function home() {
  echo "You shall not pass";
}

/**
* PPC
*/
class ppc {
	
	function usd() {
		echo "im usd";
	}

	function btc() {
		echo "im btc";
	}

}

?>
