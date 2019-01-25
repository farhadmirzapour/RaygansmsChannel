<?php

namespace NotificationChannels\RayganSms;

class TextMessage
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $type = 'txt';

    /**
     * @param string $content
     *
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }
}
