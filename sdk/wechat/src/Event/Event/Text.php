<?php

namespace Thenbsp\Wechat\Event\Event;

use Thenbsp\Wechat\Event\Event;

class Text extends Event
{
    public function isValid()
    {
        return ($this['MsgType'] === 'text');
    }
}
