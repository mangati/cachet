<?php

namespace Mangati\Cachet;

/**
 * ClientTest
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
class ClientTest extends AbstractTest
{
    public function testPing()
    {
        $result = $this->client->ping();

        $this->assertEquals($result, "Pong!");
    }
}
