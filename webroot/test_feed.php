<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Edit the cache path if you like. 

require_once("../src/CRSSFeed.php");

$feed = new \Anax\RSSFeed\CRSSFeed(['http://www.dn.se/nyheter/m/rss/']);
echo $feed->getFeed();