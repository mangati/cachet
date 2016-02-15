<?php

namespace Mangati\Cachet\Result;

use JMS\Serializer\Annotation as JMS;

class Metadata
{

    /**
     * @var Pagination
     * @JMS\Type("Mangati\Cachet\Result\Pagination")
     */
    private $pagination;
}
