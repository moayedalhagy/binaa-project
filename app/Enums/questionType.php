<?php


namespace App\Enums;


enum QuestionType: int
{
    case Multichoice = 1;
    case Checkbox = 2;
    case Yes_no = 3;
}
