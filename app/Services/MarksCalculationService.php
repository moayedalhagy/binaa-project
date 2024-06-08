<?php


namespace App\Services;

use App\Models\User;
use App\Services\Utilities\VersionPointsAggregatorService;

class MarksCalculationService
{

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function versionQuestionsPoints()
    {
        return (new VersionPointsAggregatorService($this->user->version_id))()['questions_points'];
    }

    public function versionPercent()
    {
        return $this->user->version->value;
    }


    public function userPoints()
    {
        return $this->user
            ->histories()
            ->groupBy('version_id')
            ->where('version_id', $this->user->version_id)
            ->sum('points');
    }


    public function calc()
    {

        $success_points = ($this->versionPercent() / 100) * $this->versionQuestionsPoints();
        return [

            'quesitons_points' => $this->versionQuestionsPoints(),
            'version_percent' => (float)$this->versionPercent(),
            'user_points' => (float)$this->userPoints(),
            'success_points' => $success_points,
            'success' => $success_points <= $this->userPoints(),
        ];
    }

    public function isSuccess(): bool
    {
        return $this->calc()['success'];
    }
}
