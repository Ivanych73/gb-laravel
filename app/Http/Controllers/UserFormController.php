<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order;
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
            'full_name' => ['required', 'string', 'min:3', 'max:100'],
            'text' => ['required', 'string', 'min:5']
        ]);

        $validated = $request->except('token');
        $feedback = new Feedback($validated);

        if ($feedback->save()){
            $result = [
                'result' => 'success',
                'title' => 'Отзыв успешно сохранен',
                'message' => 'Ваш отзыв успешно сохранен'
            ];
        } else {
            $result = [
                'result' => 'danger',
                'title' => 'Ошибка сохранения',
                'message' => 'Ошибка сохранения отзыва'
            ];
        }

        return view('user.store', $result);
    }

    public function saveOrder(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'min:6', 'max:100'],
            'phone' => ['required', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', 'min:10', 'max:35'],
            'text' => ['required', 'string', 'min:5']
        ]);
        $validated = $request->except('token');
        $order = new Order($validated);

        if ($order->save()){
            $result = [
                'result' => 'success',
                'title' => 'Заказ успешно сохранен',
                'message' => 'Ваш заказ успешно сохранен'
            ];
        } else {
            $result = [
                'result' => 'danger',
                'title' => 'Ошибка сохранения',
                'message' => 'Ошибка сохранения заказа'
            ];
        }

        return view('user.store', $result);
    }

}
