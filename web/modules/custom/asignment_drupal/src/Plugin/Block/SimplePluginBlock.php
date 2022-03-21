<?php 
namespace Drupal\asignment_drupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\asignment_drupal\AsignmentService;

/**
 *
 * Provide Block With Custom render 
 * @Block(
 *  id = "simple_plugin_block",
 *  admin_label = @Translation("Simple Text Block")
 * )
 */

class SimplePluginBLock extends BlockBase implements ContainerFactoryPluginInterface {

    protected $asignmentService;

    public function __construct(array $configuration,$plugin_id,$plugin_definition,AsignmentService $asignmentService){
        parent::__construct($configuration, $plugin_id, $plugin_definition);
        $this->asignmentService = $asignmentService;
    }

    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
        return new static(
          $configuration,
          $plugin_id,
          $plugin_definition,
          $container->get('asignment_drupal.asignment_service')
        );
    }
    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration() {
        return ['label_display' => FALSE];
    }
    

    public function build(){
        $query = \Drupal::entityQuery('node')->condition('status', 1)->condition('type', 'admin_configuration_form')->sort('changed' , 'DESC')->execute();
        $lastUpdatedNode = reset($query);
        $node =  \Drupal\node\Entity\Node::load($lastUpdatedNode);
        $city = $node->get('field_city')->getString();
        $country = $node->get('field_country')->getString();
        $timeZone = $node->get('field_timezone')->getString();
        $time = $this->asignmentService->getData($timeZone);
        return [
            '#theme' => 'asignment_theme',
            '#city' => $city,
            '#country' => $country,
            '#timezone' => $time,
            '#cache' => array(
                'max-age' => 0,
            )
        ];
    }
}

