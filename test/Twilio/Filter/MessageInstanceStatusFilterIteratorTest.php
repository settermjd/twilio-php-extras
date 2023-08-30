<?php

declare(strict_types=1);

namespace TwilioTest\Filter;

use Twilio\Filter\MessageInstanceStatusFilter;
use PHPUnit\Framework\TestCase;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use TwilioTest\Enum\MessageInstanceStatus;

class MessageInstanceStatusFilterIteratorTest extends TestCase
{
    public function testAcceptCanFilterMessageInstanceObjectsCorrectly()
    {
        $messages = [];

        $statusList = [
            "accepted",
            "delivered",
            "failed",
            "queued",
            "scheduled",
            "sending",
            "sent",
            "undelivered"
        ];
        foreach ($statusList as $status) {
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
