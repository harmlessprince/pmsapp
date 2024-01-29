<?php

namespace App\Enums;

enum AttendanceActionTypeEnum: string
{
    case  CHECK_IN = 'check_in';
    case  CHECK_OUT = 'check_out';
}
