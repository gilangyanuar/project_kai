<?php

namespace App;

enum ChecksheetStatus: string
{
    case Draft = 'Draft';
    case Pending = 'Pending';
    case Approval = 'Approval';
    case Approved = 'Approved';
    case Rejected = 'Rejected';
}
