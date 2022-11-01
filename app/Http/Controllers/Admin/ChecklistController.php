<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        $ChecklistGroups = ChecklistGroup::with('checklists')->get();
//        dd($ChecklistGroups);
//        return view('partials.sidebar', compact('ChecklistGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @return View
     */
    public function create(ChecklistGroup $checklistGroup):View
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->checklists()->create($request->validated());

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return View
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist): View
    {
        return view('admin.checklists.edit', compact('checklistGroup','checklist' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreChecklistRequest $request
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return RedirectResponse
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ChecklistGroup $checklistGroup
     * @param Checklist $checklist
     * @return RedirectResponse
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('home');
    }
}
