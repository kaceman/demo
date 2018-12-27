<?php
namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class DemoController extends ControllerBase {

  public function hello() {
    $build = array(
      '#type' => 'markup',
      '#markup' => 'Hello World'
    );

    return $build;
  }

}