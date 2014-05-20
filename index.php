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

		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json;');

		$url = "https://btc-e.com/api/3/ticker/ppc_usd";
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);

		$response[] = array(
			'high' => $data['ppc_usd']['high'], 
			'low' => $data['ppc_usd']['low'],
			'avg' => $data['ppc_usd']['avg']
		);

		echo json_encode($response);
	}

	function btc() {

		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json;');
		
		$url = "https://btc-e.com/api/3/ticker/ppc_btc";
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);

		$response[] = array(
			'high' => $data['ppc_btc']['high'], 
			'low' => $data['ppc_btc']['low'],
			'avg' => $data['ppc_btc']['avg']
		);

		echo json_encode($response);
	}

}

?>
