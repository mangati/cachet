<?php

namespace Mangati\Cachet\Entity;

use JMS\Serializer\Annotation as JMS;

class Component extends Entity
{
    const STATUS_OPERATIONAL        = 1;
    const STATUS_PERFORMANCE_ISSUES = 2;
    const STATUS_PARTIAL_OUTAGE     = 3;
    const STATUS_MAJOR_OUTAGE       = 4;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $link;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $status;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $order;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("group_id")
     */
    private $group;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("status_name")
     */
    private $statusName;

    public function __construct()
    {
    }

    /**
     * Get the value of Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param string name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param string description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of Link
     *
     * @param string link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of Status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of Status
     *
     * @param int status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of Order
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of Order
     *
     * @param int order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get the value of Group
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set the value of Group
     *
     * @param Group group
     *
     * @return self
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get the value of Status Name
     *
     * @return string
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * Set the value of Status Name
     *
     * @param string statusName
     *
     * @return self
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;

        return $this;
    }
}
