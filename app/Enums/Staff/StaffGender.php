<?php

namespace App\Enums\Staff;

use App\Support\Enum;

enum StaffGender: int {
    use Enum;

    case Male = 1;
    case Female = 2;
    case Other = 3;
}
