<?php
/**
 * @file
 * The Geometry plugin.
 */

namespace Drupal\geocoder\Plugin\Geocoder\Dumper;

use Drupal\geocoder\Plugin\Geocoder\Dumper;
use Drupal\geocoder\Plugin\Geocoder\DumperInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Geometry.
 *
 * @GeocoderPlugin(
 *  id = "geometry",
 *  name = "Geometry"
 * )
 */
class Geometry extends Dumper implements DumperInterface {
  /**
   * @inheritdoc
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('geocoder.dumper.geometry')
    );
  }

}