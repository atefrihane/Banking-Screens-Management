<?php

namespace App\Modules\Planning\Controllers;

use App\Contracts\PlanningRepositoryInterface;
use App\Http\Controllers\Controller;

class PlanningController extends Controller
{

    private $plannings;
    public function __construct(PlanningRepositoryInterface $plannings)
    {
        $this->plannings = $plannings;
    }

    public function showUpdatePlanning($id)
    {
        $checkPlanning = $this->plannings->fetchById($id);
        if ($checkPlanning) {
            return view('Planning::showUpdatePlanning', ['planning' => $checkPlanning]);

        }
    }
}
