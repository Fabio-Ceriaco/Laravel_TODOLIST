<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Main extends Controller
{

    public function home()
    {
        // get availeble tasks

        $tasks = Task::where('visible', 1)->orderBy('created_at', 'DESC')->get();

        return view('layouts.home', ['tasks' => $tasks]);
    }

    //================================================================

    public function see_all_tasks_invisible()
    {

        // get all tasks
        $tasks = Task::where('visible', 0)->orderBy('created_at', 'DESC')->get();

        // display all tasks

        return view('layouts.see_all_tasks_invisible', ['tasks' => $tasks]);
    }
    public function new_task()
    {
        // display new task form


        return view('layouts.new_task_frm');
    }

    //================================================================
    public function new_task_submit(Request $request)
    {
        // get the new task definition
        $new_task = $request->input('text_new_task');

        // insert data into column table task
        $task = new Task();
        $task->task = $new_task;

        $task->save();

        // return to the main page

        return redirect()->route('home');
    }

    //================================================================
    public function task_done($id_task)
    {
        // search for task in data base with $id_task
        $task = Task::find($id_task);

        // set done column to current date
        $task->done = new \Datetime();

        // save changes
        $task->save();

        // redirect to home page
        return redirect()->route('home');
    }

    //================================================================
    public function task_not_done($id_task)
    {
        // search for task in data base with $id_task
        $task = Task::find($id_task);

        // set done column to null
        $task->done = null;

        // save changes
        $task->save();

        // redirect to home page
        return redirect()->route('home');
    }

    //================================================================
    public function edit_task_frm($id_task)
    {

        // search for task in data base with $id_task
        $task = Task::find($id_task);

        // display edit form with current task data

        return view('layouts.edit_task_frm', ['task' => $task]);
    }
    //================================================================

    public function edit_task_submit(Request $request)
    {

        // get the new task definition
        $edit_task = $request->input('text_edit_task');
        $task_id = $request->input('task_id');

        $task = Task::find($task_id);

        $task->task = $edit_task;
        $task->save();

        return redirect()->route('home');
    }

    //================================================================
    public function task_visible($id_task)
    {

        $task = Task::find($id_task);

        $task->visible = 1;
        $task->save();

        return redirect()->route('home');
    }

    //================================================================
    public function task_invisible($id_task)
    {

        $task = Task::find($id_task);

        $task->visible = 0;
        $task->save();

        return redirect()->route('home');
    }
}
