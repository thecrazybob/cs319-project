<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportMessageStoreRequest;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supportMessages = SupportMessage::where('support_id', $support_id)->get();

        return view('support.show', compact('messages'));
    }

    /**
     * @param \App\Http\Requests\SupportMessageStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SupportMessageStoreRequest $request)
    {
        $supportMessage = SupportMessage::create($request->validated());

        return redirect()->route('support.show', [$support_id]);
    }
}
