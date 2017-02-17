<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    session_start();
    if(empty($_SESSION["word-count"])) {
        $_SESSION["word-count"] = "";
    }

    $app = new Silex\Application;

    $app["debug"] = true;

    $app->register(new Silex\Provider\TwigServiceProvider, ["twig.path" => __DIR__."/../views"]);

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("home.html.twig");
    });

    $app->post("/result", function() use ($app) {
        $new_RepeatCounter = new RepeatCounter;
        $result = $new_RepeatCounter->countRepeats($_POST["needle"], $_POST["haystack"]);
        return $app["twig"]->render("result.html.twig", ["needle" => $_POST["needle"], "result" => $result]);
    });

    $app->post("/enumerate", function() use ($app) {
        $new_RepeatCounter = new RepeatCounter;
        $result = $new_RepeatCounter->enumerateAll($_POST["haystack"]);
        $new_RepeatCounter->save();
        return $app["twig"]->render("enumerate.html.twig", ["result" => $result]);
    });

    $app->get("/numerical", function() use ($app) {
        $new_RepeatCounter = RepeatCounter::getActiveWordCount();
        $result = $new_RepeatCounter->sortResultsNumerically();
        return $app["twig"]->render("enumerate.html.twig", ["result" => $result]);
    });
    
    $app->get("/alphabetical", function() use ($app) {
        $new_RepeatCounter = RepeatCounter::getActiveWordCount();
        $result = $new_RepeatCounter->sortResultsAlphabetically();
        return $app["twig"]->render("enumerate.html.twig", ["result" => $result]);
    });

    return $app;
?>
