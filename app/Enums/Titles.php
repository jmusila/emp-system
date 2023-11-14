<?php

namespace App\Enums;

enum AdmissionStatus: string
{
    case PROF = "Prof";
    case DR = "Dr";
    case MR = "Mr";
    case MRS = "Mrs";
    case MISS = "Miss";
    case MS = "Ms";
    case REV = "Rev";
}
