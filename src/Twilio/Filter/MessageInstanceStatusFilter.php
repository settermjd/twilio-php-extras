<?php

declare(strict_types=1);

namespace Twilio\Filter;

use FilterIterator;
use Iterator;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use TwilioTest\Enum\MessageInstanceStatus;

class MessageInstanceStatusFilter extends FilterIterator
{
    public function __construct(Iterator $iterator, private readonly MessageInstanceStatus $status)
    {
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        /** @var MessageInstance $message */
        $message = $this->current();

        return $message->status === $this->status->value;
    }
}