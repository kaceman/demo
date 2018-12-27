<?php

namespace Drupal\demo\Plugin\Block;

use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DemoBlock
 *
 * @package Drupal\demo\Plugin\Block
 *
 * @Block(
 *   id="block_demo",
 *   admin_label="Another Hello World"
 * )
 */

class DemoBlock extends BlockBase {

  public function build() {
    return array(
      '#markup' => 'Hello ' . $this->configuration['block_first_name'],
    );
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $form['block_configuration'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#description' => $this->t('Enter your first name.'),
      '#default' => $this->configuration['block_first_name'],
    );

    return $form;
  }

  public function defaultConfiguration() {
    return array(
      'block_first_name' => 'World',
    );
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_first_name'] = $form_state->getValue('block_configuration');
  }
}