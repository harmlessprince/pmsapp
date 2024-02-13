<?php

namespace App\Enums;

enum AnalyticsFrequencyEnum: string
{
    case  DAILY = 'daily';
    case  WEEKLY = 'weekly';

    case  MONTHLY = 'monthly';

    case  YEARLY = 'yearly';
}
