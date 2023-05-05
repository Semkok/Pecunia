<?php

namespace App\Http\Controllers;

use App\Models\SavingGoal;
use App\Http\Requests\StoreSavingGoalRequest;
use App\Http\Requests\UpdateSavingGoalRequest;

class SavingGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function index()
    {
        return view('saving.saving',[
            'savingGoals' => SavingGoal::where('user_id', auth()->id())->orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSavingGoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingGoalRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'target' =>'required',
            'current' => 'required'
        ]);

        $savingGoal = new SavingGoal();
        $savingGoal->name = $request->name;
        $savingGoal->target = $request->target;
        $savingGoal->current = $request->current;
        $savingGoal->user_id = auth()->id();
        $savingGoal->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingGoal  $saving
     * @return \Illuminate\Http\Response
     */
    public function show(SavingGoal $saving)
    {
        return view('saving.show', [
            'saving' => $saving,
            'savingGoals' => SavingGoal::where('user_id', auth()->id())->orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingGoal  $saving
     * @return \Illuminate\Http\Response|mixed
     */
    public function edit(SavingGoal $saving)
    {
        return view('saving.edit', [
            'saving' => $saving,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSavingGoalRequest  $request
     * @param  \App\Models\SavingGoal  $saving
     * @return \Illuminate\Http\Response|mixed
     */
    public function update(UpdateSavingGoalRequest $request, SavingGoal $saving)
    {
        $saving->name = $request->name;
        $saving->target = $request->target;
        $saving->current = $request->current;
        $saving->save();

        return redirect('saving');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingGoal  $savingGoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingGoal $saving)
    {
        $saving->delete();
     return redirect(route('saving.index'))->with('Message', 'Savinggoal has been deleted');
    }
}
