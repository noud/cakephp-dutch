<?php
CakePlugin::load('Dutch');
include CakePlugin::path('Dutch') . 'Config' . DS . 'inflections.php';

class InflectionsTest extends CakeTestCase {

	// http://nl.wikipedia.org/wiki/Nederlandse_grammatica#Meervoudsvorm

	public function testAgente() {
		$this->__testPluralize('agente', 'agentes');
	}

	public function testBoerderij() {
		$this->__testPluralize('boerderij', 'boerderijen');
	}

	public function testStoel() {
		$this->__testPluralize('stoel', 'stoelen');
	}

	public function testTafel() {
		$this->__testPluralize('tafel', 'tafels');
	}

	private function __testPluralize($singular = null, $pural = null) {
		$result = Inflector::pluralize($singular);
		$this->assertContains($pural, $result);
	}
}
