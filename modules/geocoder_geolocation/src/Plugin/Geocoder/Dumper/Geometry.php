<?php

namespace Drupal\geocoder_geolocation\Plugin\Geocoder\Dumper;

use Drupal\geocoder\Plugin\Geocoder\Dumper\GeoJson;
use Drupal\geolocation\GeoPHP\GeoPHPInterface;
use Geocoder\Model\Address;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Geometry geocoder dumper plugin.
 *
 * @GeocoderDumper(
 *   id = "geometry",
 *   name = "Geometry",
 *   handler = "\Geocoder\Dumper\GeoJson"
 * )
 */
class Geometry extends GeoJson {

  /**
   * The geophp service.
   *
   * @var Drupal\geolocation\GeoPHP\GeoPHPInterface
   */
  protected $geophp;

  /**
   * Constructs a Drupal\Component\Plugin\PluginBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param Drupal\geolocation\GeoPHP\GeoPHPInterface $geophp
   *   The geophp service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, GeoPHPInterface $geophp) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->geophp = $geophp;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static (
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('geolocation.geophp')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function dump(Address $address) {
    return $this->geophp->load(parent::dump($address), 'json');
  }

}
