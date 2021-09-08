<?php

namespace Drupal\simple_sitemap\Plugin\simple_sitemap\SitemapGenerator;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\simple_sitemap\Annotation\SitemapGenerator;

/**
 * Class SitemapGeneratorManager
 */
class SitemapGeneratorManager extends DefaultPluginManager {

  /**
   * SitemapGeneratorManager constructor.
   * @param \Traversable $namespaces
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler
  ) {
    parent::__construct(
      'Plugin/simple_sitemap/SitemapGenerator',
      $namespaces,
      $module_handler,
      SitemapGeneratorInterface::class,
      SitemapGenerator::class
    );

    $this->alterInfo('simple_sitemap_sitemap_generators');
    $this->setCacheBackend($cache_backend, 'simple_sitemap:sitemap_generator');
  }
}
