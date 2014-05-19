<?php
  require 'vendor/autoload.php';

  $app->setName('blockmines-proxy');

  //Routes
	$app->get('/', 'home');

  // API
	$app->group('/api', function () use ($app) {

    # v1
		$app->group('/v1', function () use ($app) {

      $app->group('/:api', function () use ($app) {

      });

    });

  });

  $app->contentType('application/json');

  # lets go
	$app->run();

	function home() {
		echo "You shall not pass";
	}
?>
