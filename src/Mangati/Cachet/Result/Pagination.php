<?php

namespace Mangati\Cachet\Result;

use JMS\Serializer\Annotation as JMS;

class Pagination
{

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $total;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $count;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $perPage;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $currentPage;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $totalPages;

    /**
     * @var array
     * @JMS\Type("array<string, string>")
     */
    private $links;
}
