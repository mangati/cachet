<?php

namespace Mangati\Cachet\Result;

use JMS\Serializer\Annotation as JMS;

interface Envelope
{

    /**
     * Get the value of Data
     *
     * @return mixed
     */
    public function getData();

    /**
     * Set the value of Data
     *
     * @param mixed data
     *
     * @return self
     */
    public function setData($data);
}
