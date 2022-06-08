<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Forms\Feedback\StoreRequest;
use App\Http\Requests\User\Forms\Order\StoreRequest as OrderStoreRequest;
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

    public function saveFeedback(StoreRequest $request)
    {
        $validated = $request->validated();
        $feedback = new Feedback($validated);

        if ($feedback->save()) {
            $result = [
                'result' => 'success',
                'title' => __('message.user.form.feedback.create.success'),
                'message' => __('message.user.form.feedback.create.success')
            ];
        } else {
            $result = [
                'result' => 'danger',
                'title' => __('message.user.form.feedback.create.fail'),
                'message' => __('message.user.form.feedback.create.fail')
            ];
        }

        return view('user.store', $result);
    }

    public function saveOrder(OrderStoreRequest $request)
    {
        $validated = $request->validated();

        $order = new Order($validated);

        if ($order->save()) {
            $result = [
                'result' => 'success',
                'title' => __('message.user.form.order.create.success'),
                'message' => __('message.user.form.order.create.success')
            ];
        } else {
            $result = [
                'result' => 'danger',
                'title' => __('message.user.form.order.create.fail'),
                'message' => __('message.user.form.order.create.fail')
            ];
        }

        return view('user.store', $result);
    }

}
