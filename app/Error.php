<?php

namespace App;

class Error
{
    const PLAYER_NOT_FOUND = ['code' => 1001, 'message' => 'Player Not Found'];
    const MATCH_NOT_FOUND = ['code' => 1002, 'message' => 'Match Not Found'];
    const MERC_NOT_FOUND = ['code' => 1003, 'message' => 'Merc Not Found'];
    const MERC_DOES_NOT_BELONG_TO_PLAYER = ['code' => 1004, 'message' => 'Merc Does Not Belong To Player'];
}
