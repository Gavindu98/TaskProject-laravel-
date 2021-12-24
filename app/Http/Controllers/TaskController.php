<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $task=new Task;
        //data validation
            $this->validate($request,[
                'task'=>'required|max:100|min:5',
            ]);

        $task->task=$request->task;
        $task->save();
        //get data from db
        $data=Task::all();
        //dd($data);
        //after submit redirect view
        //return redirect()->back();
        return view('tasks')->with('tasks',$data);
    }
    public function updateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();
        return redirect()->back();

    }
    public function updateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();
    }
    public function deleteTask($id){
        $task=Task::find($id);
        
        $task->delete();
        return redirect()->back();
    }
    public function updateTaskView($id){
        $task=Task::find($id);
        return view('updatetask')->with('taskdata',$task);
    }
    public function updateTask(Request $request){
        $id=$request->id;
        $task=$request->task;
        $data=Task::find($id);
        $data->task=$task;
        $data->save();
        $datas=Task::all();
        return view('tasks')->with('tasks',$datas);
        //dd($request); //daiden data
    }
}
