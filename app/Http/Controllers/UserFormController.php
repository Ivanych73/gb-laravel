<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserFormController extends Controller
{
    public function feedback()
    {
        return view('user.feedback');
    }

    public function order()
    {
        return view('user.order');
    }

    public function saveFeedback(Request $request)
    {
        $request->validate([
            'userName' => ['required', 'string'],
            'feedbackText' => ['required', 'string']
        ]);

        $result = $this->save($request->except('_token'), "feedback");
        return view('user.store', [
            'title' => $result['title'],
            'result' => $result['result'],
            'message' => $result['message']
        ]);
    }

    public function saveOrder(Request $request)
    {
        $request->validate([
            'userName' => ['required', 'string'],
            'userEmail' => ['required', 'email'],
            'userPhone' => ['required', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            'orderText' => ['required', 'string']
        ]);
        //dd($request);
        $result = $this->save($request->except('_token'), "order");
        return view('user.store', [
            'title' => $result['title'],
            'result' => $result['result'],
            'message' => $result['message']
        ]);
    }

    private function save(array $fields, string $type)
    {
        $contents = json_encode($fields);
        $filename = $type . '/' . str_replace(' ', '', $fields['userName']) . date('-Y-m-d-h-i-s') . '.json';
        if (Storage::put($filename, $contents)) {
            $result = "success";
            $title = "$type saved";
            $message = "Your $type succesfully saved!";
        } else {
            $result = "danger";
            $title = "$type not saved";
            $message = "Error saving your $type";
        }

        return [
            'result' => $result,
            'title' => $title,
            'message' => $message
        ];
    }
}
