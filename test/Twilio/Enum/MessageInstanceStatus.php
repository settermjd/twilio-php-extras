<?php

declare(strict_types=1);

namespace TwilioTest\Enum;

enum MessageInstanceStatus: string
{
    case ACCEPTED = 'accepted';
    case DELIVERED = 'delivered';
    case FAILED = 'failed';
    case QUEUED = 'queued';
    case SCHEDULED = 'scheduled';
    case SENDING = 'sending';
    case SENT = 'sent';
    case UNDELIVERED = 'undelivered';
}
