<?php

/**
 * Test the Dutch Stemmer Steps
 *
 * @author Glenn De Backer < glenn@simplicity.be>
 */

use Simplicitylab\Stemmer\DutchStemmer;

class DutchStemmerStepsTest extends PHPUnit_Framework_TestCase
{
    private $stemmer;

    /**
     * This method is needed to access private members of the class Stemmer
     */
    protected static function getMethod($name)
    {
        $class = new ReflectionClass('Simplicitylab\Stemmer\DutchStemmer');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    protected function setUp()
    {
        // init stemmer object
        $this->stemmer = new DutchStemmer();
    }

    public function testGetRIndex()
    {

        // get private method
        $getRIndex = self::getMethod('getRIndex');

        $this->assertEquals($getRIndex->invokeArgs($this->stemmer, array("beautiful", 0)), 5);
        $this->assertEquals($getRIndex->invokeArgs($this->stemmer, array("beautiful", 5)), 7);
        $this->assertEquals($getRIndex->invokeArgs($this->stemmer, array("beauty", 0)), 5);
        $this->assertEquals($getRIndex->invokeArgs($this->stemmer, array("beauty", 5)), -1);
        $this->assertEquals($getRIndex->invokeArgs($this->stemmer, array("beau", 0)), -1);
    }

    public function testStep1()
    {

        // get private method
        $step1 = self::getMethod('step1');

        $this->assertEquals($step1->invokeArgs($this->stemmer, array("de")), "de");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("het")), "het");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("en")), "en");

        $this->assertEquals($step1->invokeArgs($this->stemmer, array("dwazigheden")), "dwazigheid");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("samenhorigheden")), "samenhorigheid");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("heden")), "heid");

        $this->assertEquals($step1->invokeArgs($this->stemmer, array("verbranden")), "verbrand");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("ophoopten")), "ophoopt");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("gemeen")), "gemeen");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("gemeene")), "gemeene");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("gemen")), "gemen");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("gemene")), "gemene");

        $this->assertEquals($step1->invokeArgs($this->stemmer, array("mams")), "mam");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("paps")), "pap");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("mamas")), "mamas");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("bendes")), "bendes");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("gemis")), "gemis");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("vlaamse")), "vlaam");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("voerse")), "voer");
        $this->assertEquals($step1->invokeArgs($this->stemmer, array("obsese")), "obsese");
    }


    public function testStep2()
    {

        // get private method
        $step2 = self::getMethod('step2');

        $this->assertEquals($step2->invokeArgs($this->stemmer, array("de")), "de");
        $this->assertEquals($step2->invokeArgs($this->stemmer, array("het")), "het");
        $this->assertEquals($step2->invokeArgs($this->stemmer, array("en")), "en");

        $this->assertEquals($step2->invokeArgs($this->stemmer, array("verkeerde")), "verkeerd");
        $this->assertEquals($step2->invokeArgs($this->stemmer, array("pastte")), "past");
        $this->assertEquals($step2->invokeArgs($this->stemmer, array("paard")), "paard");
        $this->assertEquals($step2->invokeArgs($this->stemmer, array("de")), "de");
    }

    public function testStep3a()
    {
        // get private method
        $step3a = self::getMethod('step3a');

        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("de")), "de");
        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("het")), "het");
        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("en")), "en");

        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("verkeerde")), "verkeerde");
        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("belangrijkheid")), "belangrijk");
        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("afscheid")), "afscheid");

        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("verscheidenheid")), "verscheid");
        $this->assertEquals($step3a->invokeArgs($this->stemmer, array("verscheiddenheid")), "verscheid");
    }

    public function testStep3b()
    {
        // get private method
        $step3b = self::getMethod('step3b');

        $this->assertEquals($step3b->invokeArgs($this->stemmer, array("de")), "de");
        $this->assertEquals($step3b->invokeArgs($this->stemmer, array("het")), "het");
        $this->assertEquals($step3b->invokeArgs($this->stemmer, array("en")), "en");

        $this->assertEquals($step3b->invokeArgs($this->stemmer, array("bejaardend")), "bejaard");
    }


    public function testReplace()
    {
        // get private method
        $replace = self::getMethod('replace');

        $this->assertEquals(
            $replace->invokeArgs(
                $this->stemmer,
                array('zekerheden', '/heden$/', 'heid', 0)
            ),
            "zekerheid"
        );

        $this->assertEquals(
            $replace->invokeArgs(
                $this->stemmer,
                array('hedenheden', '/heden$/', 'heid', 4)
            ),
            "hedenheid"
        );
    }

    public function testIsVowel()
    {

        // get private method
        $isVowel = self::getMethod('isVowel');

        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("a")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("e")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("i")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("o")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("u")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("y")), true);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("b")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("c")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("d")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("f")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("g")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("h")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("k")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("l")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("m")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("n")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("p")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("q")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("r")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("s")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("t")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("v")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("w")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("x")), false);
        $this->assertEquals($isVowel->invokeArgs($this->stemmer, array("z")), false);
    }

    public function testEndsWith()
    {

        // get private method
        $endsWith = self::getMethod('endsWith');

        // test method
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallo", "lo", false)), true);
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallopo", "PO", false)), true);
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallo124", "124", false)), true);
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallo", "po", false)), false);
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallo124", "po", false)), false);
        $this->assertEquals($endsWith->invokeArgs($this->stemmer, array("hallopo", "PO", true)), false);
    }

    public function testUndouble()
    {

        // get private method
        $undouble = self::getMethod('undouble');

        // test method
        $this->assertEquals($undouble->invokeArgs($this->stemmer, array("harkk")), "hark");
        $this->assertEquals($undouble->invokeArgs($this->stemmer, array("hardd")), "hard");
        $this->assertEquals($undouble->invokeArgs($this->stemmer, array("hartt")), "hart");
        $this->assertEquals($undouble->invokeArgs($this->stemmer, array("harp")), "harp");
    }
}
