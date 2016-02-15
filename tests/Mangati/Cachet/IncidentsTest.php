<?php

namespace Mangati\Cachet;

use Mangati\Cachet\Entity\Incident;

/**
 * IncidentsTest
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
class IncidentsTest extends AbstractTest
{
    private $id;

    public function testGetAll()
    {
        $result = $this->client->getIncidents();

        $this->assertEquals(true, is_array($result));
    }

    public function testGetOne()
    {
        $result = $this->client->getIncident(1);

        $this->assertEquals(true, $result instanceof Incident);
        $this->assertEquals(1, $result->getId());
    }

    public function testPost()
    {
        $incident = new Incident();
        $incident->setName('Testing my client');
        $incident->setMessage('mangati/cachet Cachet client');
        $incident->setStatus(Incident::STATUS_WATCHING);

        $result = $this->client->addIncident($incident);

        $this->assertEquals(true, $result instanceof Incident);
        $this->assertEquals(true, $result->getId() > 0);
        $this->assertEquals('Testing my client', $result->getName());

        $this->id = $result->getId();
    }

    public function testPut()
    {
        if ($this->id) {
            $incident = new Incident();
            $incident->setId($this->id);
            $incident->setName('Testing my client (updated)');
            $incident->setMessage('mangati/cachet Cachet client');
            $incident->setStatus(Incident::STATUS_FIXED);

            $result = $this->client->updateIncident($incident);

            $this->assertEquals(true, $result instanceof Incident);
            $this->assertEquals(true, $result->getId() > 0);
            $this->assertEquals('Testing my client (updated)', $result->getName());
            $this->assertEquals(Incident::STATUS_FIXED, $result->getStatus());
        }
    }

    public function testDelete()
    {
        if ($this->id) {
            $result = $this->client->deleteIncident($this->id);

            $this->assertEquals(true, $result);
        }
    }
}
