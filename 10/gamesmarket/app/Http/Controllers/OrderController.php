<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $data["orders"] = $orders;
        return view("admin.orders",$data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::user()->getAuthIdentifier();
        } else {
            $order->user_id = 0;
        }

        $order->good_id = $request->input('good_id');
        $order->price = $request->input('price');
        $order->email = $request->input('email');
        $order->user_name = $request->input('name');
        $order->save();

        Mail::raw('Заказ №'. $order->id . '. Покупатель: '.$order->user_name.', контактная почта: '.$order->email.'. Был заказан: '.$order->good->name, function($message)
        {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to('hukkejlb@gmail.com', 'hukkejlb@gmail.com')->subject('New order!');
        });

        return redirect('/myorders');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
