<?php

namespace App\Http\Controllers;

use App\Filters\ModulesFilters;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ModulesFilters $filters)
    {
        return Inertia::render('Admin/Modules/Index', [
            'modules' => Module::orderBy('updated_at', 'desc')->filter($filters)->paginate(8),
            "filters" => $request->all($filters->filterNames()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Modules/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'module_code' => 'required|unique:modules',
            'description' => 'required',
            'teacher_id' => 'nullable',
            'type' => 'required',
        ]);

        Module::create($request->all());

        return redirect()->route('admin.modules.index')->with('success', 'Module created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return Inertia::render('Admin/Modules/Show', [
            'module' => $module,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return Inertia::render('Admin/Modules/Edit', [
            'module' => $module,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required',
            'module_code' => 'required|unique:modules,module_code,'.$module->id,
            'description' => 'required',
            'teacher_id' => 'nullable',
            'type' => 'required',
        ]);

        $module->update($request->all());

        return back()->with('success', 'Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('admin.modules.index')->with('success', 'Module deleted successfully.');
    }
}
