<?php
namespace Drupal\asignment_drupal;

use Drupal\Core\Session\AccountInterface;

/**
 * Class CustomService
 * @package Drupal\mymodule\Services
 */
class AsignmentService {

  protected $currentUser;

  /**
   * CustomService constructor.
   * @param AccountInterface $currentUser
   */
  public function __construct(AccountInterface $currentUser) {
    $this->currentUser = $currentUser;
  }


  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getData() {

    // $nodeQuery = new EntityFieldQuery();
    // $nodes = $nodeQuery->entityCondition('entity_type', 'node')
    //   ->fieldCondition('field_status', 'value', 1)
    //   ->propertyOrderBy('created', 'DESC')
    //   ->range(0, 10)
    //   ->execute();
    
   $date = date_default_timezone_set('America/New_York');
    $result = date('jS F Y - H:i A');

    // $serviceDateFormate = \Drupal::service('date.formatter')->format(strtotime($date_output), $type = 'medium', 'jS F Y','Europe/Amsterdam');
    return $result;
  }

}