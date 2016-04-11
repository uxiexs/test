<?php

namespace Thenbsp\Wechat\Event\Event;

use Thenbsp\Wechat\Event\Event;

class Unsubscribe extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'event')
            && ($this['Event'] === 'unsubscribe');
    }
}
