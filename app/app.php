<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    session_start();
    if(empty($_SESSION["word-count"])) {
      $_SESSION["word-count"] = "";
    }

    $app = new Silex\Application;

    $app->register(new Silex\Provider\TwigServiceProvider, ["twig.path" => __DIR__."/../views"]);

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("home.html.twig");
    });

    $app->post("/result", function() use ($app) {
      $needle = $_POST["needle"];
      $haystack = $_POST["haystack"];
      $new_RepeatCounter = new RepeatCounter;
      $result;
      if ($needle) {
          $result = $new_RepeatCounter->countRepeats($needle, $haystack);
      } else {
          $result = $new_RepeatCounter->enumerateAll($haystack);
      }
      return $app["twig"]->render("result.html.twig", ["needle" => $needle, "result" => $result]);
    });

    return $app;
?>
