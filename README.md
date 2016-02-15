# Cachet

Cachet PHP client.

## About Cachet

Cachet is an open source status page system written in PHP. https://github.com/CachetHQ/Cachet.

## Usage

Setup

```php
use Mangati\Cachet\Client;

$endpoint = 'https://demo.cachethq.io/api/v1/';
$token    = '9yMHsdioQosnyVK4iCVR';

$client = new Client($endpoint, $token);
```

### Components

Get components

```php
$components = $client->getComponents();

foreach ($components as $component) {
    echo $component->getName();
}
```

Sorting

```php
$components = $client->getComponents([
    'sort' => 'id',
    'order' => 'desc'
]);
```

Get by id

```php
$component = $client->getComponent(3);
```

Create new component

```php
$component = new Component();
$component->setName('My new component');
$component->setDescription('Component description');
$component->setLink('https://github.com/mangati/cachet');
$component->setStatus(Component::STATUS_OPERATIONAL);

$client->addComponent($component);
```

Update an existing component

```php
$component = new Component();
$component->setId(3);
$component->setName('My new component (updated)');

$client->updateComponent($component);
```

Delete an existing component

```php
$id = 3;

$client->deleteComponent($id);
```


### Incidents

Get incidents

```php
$incidents = $client->getIncidents();

foreach ($incidents as $incident) {
    echo $incident->getName();
}
```

Sorting

```php
$incidents = $client->getIncidents([
    'sort' => 'id',
    'order' => 'desc'
]);
```

Get by id

```php
$incident = $client->getIncident(3);
```

Create new incident

```php
$incident = new Incident();
$incident->setName('My new incident');
$incident->setMessage('incident message');
$incident->setStatus(Incident::STATUS_WATCHING);

$client->addIncident($incident);
```

Update an existing incident

```php
$incident = new Incident();
$incident->setId(3);
$incident->setStatus(Incident::STATUS_FIXED);

$client->updateIncident($incident);
```

Delete an existing incident

```php
$id = 3;

$client->deleteIncident($id);
```


## Known issue

Doctrine annotation error:

```php
PHP Fatal error:  Uncaught exception 'Doctrine\Common\Annotations\AnnotationException' with message '[Semantical Error] The annotation "@JMS\Serializer\Annotation\Type" in property (...) does not exist, or could not be auto-loaded.'
```

Can fix it registering the JMS namespace:

```php
Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', $rootDir . "/vendor/jms/serializer/src");
```
