<?php

namespace Mangati\Cachet;

use Mangati\Cachet\Entity\Component;

/**
 * ComponentsTest
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
class ComponentsTest extends AbstractTest
{
    private $id;

    public function testGetAll()
    {
        $result = $this->client->getComponents();

        $this->assertEquals(true, is_array($result));
    }

    public function testGetOne()
    {
        $result = $this->client->getComponent(1);

        $this->assertEquals(true, $result instanceof Component);
        $this->assertEquals(1, $result->getId());
    }

    public function testPost()
    {
        $component = new Component();
        $component->setName('Testing my client');
        $component->setDescription('mangati/cachet Cachet client');
        $component->setLink('https://github.com/mangati/cachet');
        $component->setStatus(Component::STATUS_OPERATIONAL);

        $result = $this->client->addComponent($component);

        $this->assertEquals(true, $result instanceof Component);
        $this->assertEquals(true, $result->getId() > 0);
        $this->assertEquals('Testing my client', $result->getName());

        $this->id = $result->getId();
    }

    public function testPut()
    {
        if ($this->id) {
            $component = new Component();
            $incident->setId($this->id);
            $component->setName('Testing my client (updated)');
            $component->setDescription('mangati/cachet Cachet client');
            $component->setLink('https://github.com/mangati/cachet');
            $component->setStatus(Component::STATUS_OPERATIONAL);

            $result = $this->client->updateComponent($component);

            $this->assertEquals(true, $result instanceof Component);
            $this->assertEquals(true, $result->getId() > 0);
            $this->assertEquals('Testing my client (updated)', $result->getName());
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
