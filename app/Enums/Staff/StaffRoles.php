<?php

namespace App\Enums\Staff;

use App\Support\Enum;

enum StaffRoles: int {
    use Enum;

    case Staff = 1;
    case Manager = 2;
}
