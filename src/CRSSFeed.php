<?php
/**
 * A factory wrapper for creating  objects of external RSS libs.
 * 
 */

namespace Anax\RSSFeed;
use Exception;
use SimplePie;

// cache path - wherever you want it. 
define('CACHE', __DIR__.'/../webroot/data/crssfeed');
require_once(__DIR__."/simplepie/simplepie_1.3.1.mini.php");

class CRSSFeed {
  // constructor - initialize SimplePie.
  public function __construct($feedArr, $duration = 3600) {
      $this->object = new SimplePie();
      $this->object->set_cache_location(CACHE);
      $this->object->set_cache_duration($duration);
      $this->object->set_feed_url($feedArr);
      $this->object->init();
  }

  // return content. 
  public function getFeed() {
      $feedItems = $this->object->get_items();
      $html = '<article>';
      foreach($feedItems as $content) {
          $html .= '<div class="feed-content">';
          $html .= "<h2>{$content->get_title()}</h2>";
          $html .= "<p>{$content->get_content()}</p>";
          $html .= "<p><a href='" . $content->get_permalink() . "'>Läs mer</a>";
          $html .= '</div>';
      }
      $html .= "</article>";
          return $html;
  }
}