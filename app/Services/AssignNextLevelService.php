<?php


namespace App\Services;

use App\Models\Level;
use App\Models\User;

class AssignNextLevelService
{

    public User $user;
    public Level $nextLevel;


    public function __construct(User $user)
    {

        $this->user = $user;

        $nextId = $user->version->level->sort_order + 1;

        $this->nextLevel = Level::where('sort_order', $nextId)->first();
    }


    public function __invoke()
    {
        return $this->user->update([
            'version_id' => $this->nextLevel->currentVersion->id
        ]);
    }
}
