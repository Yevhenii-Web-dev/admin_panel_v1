<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChecklistGroupController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('admin.checklist_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChecklistGroupRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreChecklistGroupRequest $request): RedirectResponse
    {
        ChecklistGroup::create($request->validated());

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
     * @param checklistGroup $checklistGroup
     * @return View
     */
    public function edit(checklistGroup $checklistGroup): View
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreChecklistGroupRequest  $request
     * @param  $checklistGroup
     * @return RedirectResponse
     */
    public function update(StoreChecklistGroupRequest $request, checklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  checklistGroup $checklistGroup
     * @return RedirectResponse
     */
    public function destroy(checklistGroup $checklistGroup)
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
