<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {

  public function getFormId() {
    return 'contact_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = array();

    $form['contact_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#default_value' => '',
      '#required' => false,
    );

    $form['contact_email'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#default_value' => '',
      '#required' => true,
    );

    $form['contact_message'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Your message'),
      '#description' => $this->t('Please add "Drupal" in this message'),
      '#default_value' => '',
      '#required' => true,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    );

    return $form;

  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $email_value = $form_state->getValue('contact_email');
    $msg = 'Your email has been sent successfully. You have been received a confirmation';

    $this->messenger()->addMessage($msg);
  }
}