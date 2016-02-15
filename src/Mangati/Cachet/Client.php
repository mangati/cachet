<?php

namespace Mangati\Cachet;

use Mangati\Cachet\Result\Generic\StringEnvelope;
use Mangati\Cachet\Entity\Component;
use Mangati\Cachet\Result\Component\ComponentEnvelope;
use Mangati\Cachet\Result\Component\ComponentsEnvelope;
use Mangati\Cachet\Entity\Incident;
use Mangati\Cachet\Result\Incident\IncidentEnvelope;
use Mangati\Cachet\Result\Incident\IncidentsEnvelope;
use Mangati\Cachet\Entity\Group;
use Mangati\Cachet\Result\Group\GroupEnvelope;
use Mangati\Cachet\Result\Group\GroupsEnvelope;
use Mangati\Cachet\Http\RequestHandler;

class Client
{

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var string
     */
    private $token;

    /**
     * RequestHandler
     */
    private $handler;

    public function __construct($endpoint, $token = null)
    {
        $this->endpoint = $endpoint;
        $this->token = $token;

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $this->handler = new RequestHandler($this, $serializer);
    }

    /**
     * Get the value of Endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Get the value of Token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return Component[]
     */
    public function ping()
    {
        $envelope = $this->handler->get('ping', StringEnvelope::class);

        return $envelope->getData();
    }

    /**
     * @return Component[]
     */
    public function getComponents(array $params = [])
    {
        $envelope = $this->handler->get('components', ComponentsEnvelope::class, $params);

        return $envelope->getData();
    }

    /**
     * @param int $id
     * @return Component
     */
    public function getComponent($id)
    {
        $envelope = $this->handler->get('components/' . $id, ComponentEnvelope::class);

        return $envelope->getData();
    }

    /**
     * @param Component $component
     * @return Component
     */
    public function addComponent(Component $component)
    {
        $envelope = $this->handler->post('components', ComponentEnvelope::class, $component);

        return $envelope->getData();
    }

    /**
     * @param Component $component
     * @return Component
     */
    public function updateComponent(Component $component)
    {
        $envelope = $this->handler->put('components/' . $component->getId(), ComponentEnvelope::class, $component);

        return $envelope->getData();
    }

    /**
     * @param Component $component
     */
    public function deleteComponent($id)
    {
        $this->handler->delete('components/' . $id, $id);

        return true;
    }

    /**
     * @return Incident[]
     */
    public function getIncidents(array $params = [])
    {
        $envelope = $this->handler->get('incidents', IncidentsEnvelope::class, $params);

        return $envelope->getData();
    }

    /**
     * @param int $id
     * @return Incident
     */
    public function getIncident($id)
    {
        $envelope = $this->handler->get('incidents/' . $id, IncidentEnvelope::class);

        return $envelope->getData();
    }

    /**
     * @param Incident $incident
     * @return Incident
     */
    public function addIncident(Incident $incident)
    {
        $envelope = $this->handler->post('incidents', IncidentEnvelope::class, $incident);

        return $envelope->getData();
    }

    /**
     * @param Incident $incident
     * @return Incident
     */
    public function updateIncident(Incident $incident)
    {
        $envelope = $this->handler->put('incidents/' . $incident->getId(), IncidentEnvelope::class, $incident);

        return $envelope->getData();
    }

    /**
     * @param Incident $incident
     */
    public function deleteIncident($id)
    {
        $this->handler->delete('incidents/' . $id, $id);

        return true;
    }

    /**
     * @return Group[]
     */
    public function getGroups(array $params = [])
    {
        $envelope = $this->handler->get('components/groups', GroupsEnvelope::class, $params);

        return $envelope->getData();
    }

    /**
     * @param int $id
     * @return Component
     */
    public function getGroup($id)
    {
        $envelope = $this->handler->get('components/groups/' . $id, GroupEnvelope::class);

        return $envelope->getData();
    }
}
