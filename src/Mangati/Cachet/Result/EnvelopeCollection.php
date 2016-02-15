<?php

namespace Mangati\Cachet\Result;

use JMS\Serializer\Annotation as JMS;

abstract class EnvelopeCollection implements Envelope
{

    /**
     * @var Metadata
     * @JMS\Type("Mangati\Cachet\Result\Metadata")
     */
    private $meta;

    /**
     * Get the value of Meta
     *
     * @return Metadata
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set the value of Meta
     *
     * @param Metadata meta
     *
     * @return self
     */
    public function setMeta(Metadata $meta)
    {
        $this->meta = $meta;

        return $this;
    }

}
