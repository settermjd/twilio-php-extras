<?php

declare(strict_types=1);

namespace TwilioTest\Filter;

use PHPUnit\Framework\TestCase;
use Twilio\Enum\MessageInstanceStatus;
use Twilio\Filter\MessageInstanceStatusFilter;
use Twilio\Rest\Api\V2010\Account\MessageInstance;

class MessageInstanceStatusFilterIteratorTest extends TestCase
{
    public function testAcceptCanFilterMessageInstanceObjectsCorrectly()
    {
        $messages = [];

        $statuses = array_column(MessageInstanceStatus::cases(),'value');
        foreach ($statuses as $status) {
            $message = $this->createMock(MessageInstance::class);
            $message->status = $status;
            $messages[] = $message;
        }

        $filter = new MessageInstanceStatusFilter(
            new \ArrayIterator($messages),
            MessageInstanceStatus::SCHEDULED,
        );

        $this->assertSame(1, iterator_count($filter));
    }
}
