<?php

/**
 * Test the Dutch Stemmer class
 *
 * @author Glenn De Backer < glenn@simplicity.be>
 */

namespace Simplicitylab\Tests;

use Simplicitylab\Stemmer\DutchStemmer;

class DutchStemmerTest extends PHPUnit_Framework_TestCase
{
    private $stemmer;

    protected function setUp()
    {
        // init stemmer object
        $this->stemmer = new DutchStemmer();
    }

    public function testStemmer()
    {
        // taken list of words from  http://snowball.tartarus.org/algorithms/dutch/stemmer.html
        $this->assertEquals($this->stemmer->stemWord("lichaamsziek"), "lichaamsziek");
        $this->assertEquals($this->stemmer->stemWord("lichamelijk"), "licham");
        $this->assertEquals($this->stemmer->stemWord("lichamelijke"), "licham");
        $this->assertEquals($this->stemmer->stemWord("lichamelijkheden"), "licham");
        $this->assertEquals($this->stemmer->stemWord("lichamen"), "licham");
        $this->assertEquals($this->stemmer->stemWord("lichere"), "licher");
        $this->assertEquals($this->stemmer->stemWord("licht"), "licht");
        $this->assertEquals($this->stemmer->stemWord("lichtbeeld"), "lichtbeeld");
        $this->assertEquals($this->stemmer->stemWord("lichtbruin"), "lichtbruin");
        $this->assertEquals($this->stemmer->stemWord("lichtdoorlatende"), "lichtdoorlat");
        $this->assertEquals($this->stemmer->stemWord("lichte"), "licht");
        $this->assertEquals($this->stemmer->stemWord("lichten"), "licht");
        $this->assertEquals($this->stemmer->stemWord("lichtende"), "lichtend");
        $this->assertEquals($this->stemmer->stemWord("lichtenvoorde"), "lichtenvoord");
        $this->assertEquals($this->stemmer->stemWord("lichter"), "lichter");
        $this->assertEquals($this->stemmer->stemWord("lichtere"), "lichter");
        $this->assertEquals($this->stemmer->stemWord("lichters"), "lichter");
        $this->assertEquals($this->stemmer->stemWord("lichtgevoeligheid"), "lichtgevoel");
        $this->assertEquals($this->stemmer->stemWord("lichtgewicht"), "lichtgewicht");
        $this->assertEquals($this->stemmer->stemWord("lichtgrijs"), "lichtgrijs");
        $this->assertEquals($this->stemmer->stemWord("lichthoeveelheid"), "lichthoevel");
        $this->assertEquals($this->stemmer->stemWord("lichtintensiteit"), "lichtintensiteit");
        $this->assertEquals($this->stemmer->stemWord("lichtje"), "lichtj");
        $this->assertEquals($this->stemmer->stemWord("lichtjes"), "lichtjes");
        $this->assertEquals($this->stemmer->stemWord("lichtkranten"), "lichtkrant");
        $this->assertEquals($this->stemmer->stemWord("lichtkring"), "lichtkring");
        $this->assertEquals($this->stemmer->stemWord("lichtkringen"), "lichtkring");
        $this->assertEquals($this->stemmer->stemWord("lichtregelsystemen"), "lichtregelsystem");
        $this->assertEquals($this->stemmer->stemWord("lichtste"), "lichtst");
        $this->assertEquals($this->stemmer->stemWord("lichtstromende"), "lichtstrom");
        $this->assertEquals($this->stemmer->stemWord("lichtstromende"), "lichtstrom");
        $this->assertEquals($this->stemmer->stemWord("lichtte"), "licht");
        $this->assertEquals($this->stemmer->stemWord("lichtten"), "licht");
        $this->assertEquals($this->stemmer->stemWord("lichttoetreding"), "lichttoetred");
        $this->assertEquals($this->stemmer->stemWord("lichtverontreinigde"), "lichtverontreinigd");
        $this->assertEquals($this->stemmer->stemWord("lichtzinnige"), "lichtzinn");
        $this->assertEquals($this->stemmer->stemWord("lid"), "lid");
        $this->assertEquals($this->stemmer->stemWord("lidia"), "lidia");
        $this->assertEquals($this->stemmer->stemWord("lidmaatschap"), "lidmaatschap");
        $this->assertEquals($this->stemmer->stemWord("lidstaten"), "lidstat");
        $this->assertEquals($this->stemmer->stemWord("lidvereniging"), "lidveren");
        $this->assertEquals($this->stemmer->stemWord("opgingen"), "opging");
        $this->assertEquals($this->stemmer->stemWord("opglanzing"), "opglanz");
        $this->assertEquals($this->stemmer->stemWord("opglanzingen"), "opglanz");
        $this->assertEquals($this->stemmer->stemWord("opglimlachten"), "opglimlacht");
        $this->assertEquals($this->stemmer->stemWord("opglimpen"), "opglimp");
        $this->assertEquals($this->stemmer->stemWord("opglimpende"), "opglimp");
        $this->assertEquals($this->stemmer->stemWord("opglimping"), "opglimp");
        $this->assertEquals($this->stemmer->stemWord("opglimpingen"), "opglimp");
        $this->assertEquals($this->stemmer->stemWord("opgraven"), "opgrav");
        $this->assertEquals($this->stemmer->stemWord("opgrijnzen"), "opgrijnz");
        $this->assertEquals($this->stemmer->stemWord("opgrijzende"), "opgrijz");
        $this->assertEquals($this->stemmer->stemWord("opgroeien"), "opgroei");
        $this->assertEquals($this->stemmer->stemWord("opgroeiende"), "opgroei");
        $this->assertEquals($this->stemmer->stemWord("opgroeiplaats"), "opgroeiplat");
        $this->assertEquals($this->stemmer->stemWord("ophaal"), "ophal");
        $this->assertEquals($this->stemmer->stemWord("ophaaldienst"), "ophaaldienst");
        $this->assertEquals($this->stemmer->stemWord("ophaalkosten"), "ophaalkost");
        $this->assertEquals($this->stemmer->stemWord("ophaalsystemen"), "ophaalsystem");
        $this->assertEquals($this->stemmer->stemWord("ophaalt"), "ophaalt");
        $this->assertEquals($this->stemmer->stemWord("ophaaltruck"), "ophaaltruck");
        $this->assertEquals($this->stemmer->stemWord("ophalen"), "ophal");
        $this->assertEquals($this->stemmer->stemWord("ophalend"), "ophal");
        $this->assertEquals($this->stemmer->stemWord("ophalers"), "ophaler");
        $this->assertEquals($this->stemmer->stemWord("ophef"), "ophef");
        $this->assertEquals($this->stemmer->stemWord("opheffen"), "opheff");
        $this->assertEquals($this->stemmer->stemWord("opheffende"), "opheff");
        $this->assertEquals($this->stemmer->stemWord("opheffing"), "opheff");
        $this->assertEquals($this->stemmer->stemWord("opheldering"), "ophelder");
        $this->assertEquals($this->stemmer->stemWord("ophemelde"), "ophemeld");
        $this->assertEquals($this->stemmer->stemWord("ophemelen"), "ophemel");
        $this->assertEquals($this->stemmer->stemWord("opheusden"), "opheusd");
        $this->assertEquals($this->stemmer->stemWord("ophief"), "ophief");
        $this->assertEquals($this->stemmer->stemWord("ophield"), "ophield");
        $this->assertEquals($this->stemmer->stemWord("ophieven"), "ophiev");
        $this->assertEquals($this->stemmer->stemWord("ophoepelt"), "ophoepelt");
        $this->assertEquals($this->stemmer->stemWord("ophoog"), "ophog");
        $this->assertEquals($this->stemmer->stemWord("ophoogzand"), "ophoogzand");
        $this->assertEquals($this->stemmer->stemWord("ophopen"), "ophop");
        $this->assertEquals($this->stemmer->stemWord("ophoping"), "ophop");
        $this->assertEquals($this->stemmer->stemWord("ophouden"), "ophoud");
        $this->assertEquals($this->stemmer->stemWord("ophoud"), "ophoud");
        $this->assertEquals($this->stemmer->stemWord("brood"), "brod");
    }
}
