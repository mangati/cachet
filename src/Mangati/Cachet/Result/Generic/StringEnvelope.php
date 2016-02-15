<?php

namespace Mangati\Cachet\Result\Generic;

use Mangati\Cachet\Result\Envelope;
use JMS\Serializer\Annotation as JMS;

class StringEnvelope implements Envelope
{

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $data;

    /**
     * Get the value of Data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of Data
     *
     * @param string data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
