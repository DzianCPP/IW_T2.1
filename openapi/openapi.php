<?php

use OpenApi\Processors\DocBlockDescriptions;
use OpenApi\Processors\MergeIntoComponents;
use OpenApi\Processors\MergeIntoOpenApi;

require_once '../bootstrap/base-paths.php';
require_once '../vendor/autoload.php';

$validate = true;
$logger = new \Psr\Log\NullLogger();
$oa = (new \OpenApi\Generator($logger))
    ->setAliases(['OA' => 'OpenApi\\Attributes'])
    ->setNamespaces(['OpenApi\\Attributes'])
    ->setAnalyser(new \OpenApi\Analysers\TokenAnalyser())
    ->generate(
        sources: ['../core/models/UsersApiModel.php'],
        validate: $validate,
        analysis: new \OpenApi\Analysis()
    );
