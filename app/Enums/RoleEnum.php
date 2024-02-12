<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'dashboard';
    case RESELLER = 'reseller';
    case SITE_INSPECTOR = 'site_inspector';

    case COMPANY_OWNER = 'company_owner';
    case SECURITY = 'security';

}
