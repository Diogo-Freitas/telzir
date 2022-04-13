<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Interfaces\CallServiceInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\DirectDistanceDialingRepositoryInterface;

class HomeController extends Controller
{
    protected $directDistanceDialingRepository;
    protected $planRepository;
    protected $callService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DirectDistanceDialingRepositoryInterface $directDistanceDialingRepository, PlanRepositoryInterface $planRepository, CallServiceInterface $callService)
    {
        $this->directDistanceDialingRepository = $directDistanceDialingRepository;
        $this->planRepository = $planRepository;
        $this->callService = $callService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\SearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        $ddds = $this->directDistanceDialingRepository->getAllDirectDistanceDialings();

        $plans = $this->planRepository->getAllPlans();

        $selectedPlan = $this->planRepository->getPlanById($request->plan);

        $withoutPlan = $this->callService->cost($request->source, $request->destination, $request->time);

        $withPlan = $this->callService->planCost($request->source, $request->destination, $request->time, $request->plan);

        return view('home', compact('ddds', 'plans', 'selectedPlan', 'withPlan', 'withoutPlan'));
    }

}
