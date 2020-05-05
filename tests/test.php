<?php

use PpmParser\NodeDumper;
use PpmParser\ParserFactory;

    $Source = __DIR__ .DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PpmParser';

    include_once($Source . DIRECTORY_SEPARATOR . 'PpmParser.php');

    $Code = file_get_contents($Source . DIRECTORY_SEPARATOR . 'PrettyPrinterAbstract.php');
    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

    try
    {
        $ast = $parser->parse($Code);
    }
    catch (Error $error)
    {
        echo "Parse error: {$error->getMessage()}\n";
        return;
    }

    $dumper = new NodeDumper;
    echo $dumper->dump($ast) . "\n";