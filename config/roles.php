<?php

use App\Enums\Roles;

return [
    Roles::ADMIN => [
        "view_data",
        "modify_data",
        "collect_date",
    ],
    Roles::HUMAN_RESOURCE => [
        "view_data",
    ],
    Roles::FIELD_OFFICER => [
        "view_data",
        "collect_date",
        "modify_data",
    ]
];
