<?php

namespace App;

enum TaskStatus:string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case PENDING = 'pending';
    case WAITTING_CLIENT = 'waiting_client';
    case CLOSED = 'closed';
    case BLOCKED = 'blocked';
}
