<?php

namespace Mangati\Cachet;

use PHPUnit_Framework_TestCase;

/**
 * AbstractTest
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
abstract class AbstractTest extends PHPUnit_Framework_TestCase
{

    protected $client;

    protected function setUp()
    {
        $this->client = new Client('https://demo.cachethq.io/api/v1/', '9yMHsdioQosnyVK4iCVR');
    }
}
