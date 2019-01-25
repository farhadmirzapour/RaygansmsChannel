<?php

namespace NotificationChannels\RayganSms;

class AuthCodeMessage
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var boolean
     */
    public $autoGenerate;

    /**
     * @var string
     */
    public $type = 'auth';

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

    /**
     * @param boolean $autoGenerateCode
     *
     * @return $this
     */
    public function autoGenerate($autoGenerate = true)
    {
        $this->autoGenerate = $autoGenerate;

        return $this;
    }

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'content' => $this->content,
            'autoGenerate' => $this->autoGenerate
        ];
    }
}
