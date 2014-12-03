<?php

namespace Anax\RSSFeed;

class CRSSFeedTest extends \PHPUnit_Framework_Testcase {
	
	public function testClassType() {
		$feed = new CRSSFeed(['http://www.dn.se/nyheter/m/rss/']);
		$test = get_class($feed);
		$exp = "Anax\RSSFeed\CRSSFeed";
		$this->assertEquals($test, $exp, "Wrong class");
	}

	public function testGetFeed() {
		$feed = new CRSSFeed(['http://www.dn.se/nyheter/m/rss/']);
		$test = substr($feed->getFeed(), 0, 35);
		$exp = "<article><div class=\"feed-content\">";
		echo $exp;
		$this->assertEquals($test, $exp, "Output does not match expected");
	}
}