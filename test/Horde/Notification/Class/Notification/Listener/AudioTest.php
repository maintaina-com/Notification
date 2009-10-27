<?php
/**
 * Test the audio listener class.
 *
 * PHP version 5
 *
 * @category Horde
 * @package  Notification
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Notification
 */

/**
 * Prepare the test setup.
 */
require_once dirname(__FILE__) . '/../../../Autoload.php';

/**
 * Test the audio listener class.
 *
 * Copyright 2009 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category Horde
 * @package  Notification
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Notification
 */
class Horde_Notification_Class_Notification_Listener_AudioTest extends PHPUnit_Extensions_OutputTestCase
{
    public function testMethodHandleHasResultBooleanTrueForAudioMessages()
    {
        $listener = new Horde_Notification_Listener_Audio();
        $this->assertTrue($listener->handles('audio'));
    }

    public function testMethodGetnameHasResultStringAudio()
    {
        $listener = new Horde_Notification_Listener_Audio();
        $this->assertEquals('audio', $listener->getName());
    }

    public function testMethodNotifyHasOutputEventMessage()
    {
        $listener = new Horde_Notification_Listener_Audio();
        $event = new Horde_Notification_Event('test');
        $messages = array(
            array(
                'class' => 'Horde_Notification_Event',
                'event' => serialize($event)
            )
        );
        $this->expectOutputString(
            '<embed src="test" width="0" height="0" autostart="true" />'
        );
        $listener->notify($messages);
    }
}