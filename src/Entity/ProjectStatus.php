<?php

namespace App\Entity;

enum ProjectStatus: string
{
    case Pending = 'pending';
    case Published = 'published';
    case Rejected = 'rejected';
}
