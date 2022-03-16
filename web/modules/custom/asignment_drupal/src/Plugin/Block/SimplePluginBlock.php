<?php 
namespace Drupal\asignment_drupal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 *
 * Provide Block With Custom render 
 * @Block(
 *  id = "simple_plugin_block",
 *  admin_label = @Translation("Simple Text Block")
 * )
 */

class SimplePluginBLock extends BlockBase{
    /**
     * {@inheritdoc}
     */

    public function build(){
        $data = \Drupal::service('asignment_drupal.asignment_service')->getData();
        return [
            '#type' => 'markup',
            '#markup' => $data,
            '#cache' => array(
                'max-age' => 0,
            )
        ];
    }
}

