<?php

namespace App\Http\Controllers\Api;

use App\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
 

    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $fileUrl = $this->uploadMedia($request);
        Todo::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'due_date' => $request->get('due_date'),
            'user_id' => $request->get('user_id'),
            'media' => $fileUrl,
            'completed' => $request->get('completed'),
        ]);

        return redirect('/todo')
            ->with('flash_notification.message', 'New todo created successfully')
            ->with('flash_notification.level', 'success');
    }

    /**
     * Update Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $todo = Todo::find($request->get('todo_id'));
        $fileUrl = $this->uploadMedia($request);
        $todo->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'due_date' => $request->get('due_date'),
            'user_id' => $request->get('user_id'),
            'media' => $fileUrl ?? "",
            'completed' => $request->get('completed'),
        ]);
        return redirect('/todo')
            ->with('flash_notification.message', 'New todo created successfully')
            ->with('flash_notification.level', 'success');
    }

    public function uploadMedia($request) {
        $fileUrl =  "";
        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'file-' . date('Y-m-d') . '-' . date('H-i-s') . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/';

            $file->move($destinationPath, $fileName);

            $fileUrl = url('uploads/' . $fileName);
        }
        return $fileUrl;
    }

    /**
     * Delete Todo.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()
            ->route('todo.index')
            ->with('flash_notification.message', 'Todo deleted successfully')
            ->with('flash_notification.level', 'success');
    }
}
