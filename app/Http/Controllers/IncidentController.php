<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Exports\AttendanceExport;
use App\Models\Incident;
use App\QueryFilters\AttendanceActionTypeFilter;
use App\QueryFilters\CompanyIdFilter;
use App\QueryFilters\DateFilter;
use App\QueryFilters\SiteIdFilter;
use App\QueryFilters\StatusFilter;
use App\Repositories\Eloquent\Repository\CompanyRepository;
use App\Repositories\Eloquent\Repository\SiteRepository;
use App\Services\IncidentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function __construct(
        private readonly IncidentService $incidentService,
        private readonly CompanyRepository $companyRepository,
        private readonly SiteRepository $siteRepository,
    )
    {
    }
//ehomenick@example.net,
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $companies =  $this->companyRepository->all();
        $incidents =  $this->incidentService->getAll(\request()->user(), request()->query('per_page', 15));
        $sites =  [];
        if ($user->hasRole(RoleEnum::COMPANY_OWNER)) {
            $sites = $this->siteRepository->all();
        }


        return view('incident.index', compact('incidents', 'companies', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index')->with('success', 'Incident deleted successfully');
    }
}
