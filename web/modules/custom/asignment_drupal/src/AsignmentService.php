<?php
namespace Drupal\asignment_drupal;

use Drupal\Component\Datetime\TimeInterface;

/**
 * Class CustomService
 * @package Drupal\mymodule\Services
 */
class AsignmentService {

  protected $time;
  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getData($timeZone = false) {
    $date = date_default_timezone_set($timeZone);
    $result = date('jS F Y - h:i A');
    // $serviceDateFormate = \Drupal::service('date.formatter')->format(strtotime($date_output), $type = 'medium', 'jS F Y','Europe/Amsterdam');
    return $result;
  }

}