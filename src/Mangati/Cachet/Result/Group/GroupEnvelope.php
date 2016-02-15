<?php

namespace Mangati\Cachet\Result\Group;

use Mangati\Cachet\Result\Envelope;
use JMS\Serializer\Annotation as JMS;

class GroupEnvelope implements Envelope
{

    /**
     * @var Mangati\Cachet\Entity\Group
     * @JMS\Type("Mangati\Cachet\Entity\Group")
     */
    private $data;

    /**
     * Get the value of Data
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of Data
     *
     * @param mixed data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
