<?php


namespace App\Enums;


enum Roles: String
{
    case Admin = 'Admin';
    case User = 'User';
    case HiddenUser = 'HiddenUser';
}
