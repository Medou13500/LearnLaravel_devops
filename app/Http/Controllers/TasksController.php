<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\Task;



class tasksController extends Controller
{
//! faire un get
public function index(){
    $tasks = Task::all();
    return view ('tasks.index', compact('tasks'));
}
//! get par id
public function show($id){
    $tasks = Task::find($id);
    return view ('tasks.index', compact('tasks'));
}
//! faire un POST
    public function store(Request $request){
        $request ->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'completed'=>'required|boolean',
        ]);
        Task::create($request->only(['title', 'description', 'completed']));
        return redirect()->route('tasks.index')
        ->with('succes','Created succesfully');
    }
//! faire un update
    public function update(Request $request,$id){
        $request ->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'completed'=>'required|boolean',
        ]);
        $update= Task::find($id);
        $update->update($request->all()); //! update fait partie de eloque
        return redirect()->route('tasks.index')
        ->with('succes','updated succesfully');
    }
    //! update par id
public function edit($id){
    $tasks = Task::all($id);
    return view ('tasks.index', compact('tasks'));
}
//! faire un delete
    public function delete($id){
    $tasks = Task::find($id);
    $tasks->delete();
    return redirect()->route('tasks.index')
    ->with('succes','delete succesfully');
}


}
