<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportStoreRequest;
use App\Http\Requests\SupportUpdateRequest;
use App\Models\Support;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supportTickets = Support::where('patient_id', auth()->user()->patient->id)->get();

        return view('support.index', compact('supportTickets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Support      $support
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Support $support)
    {
        $this->authorize('view', $support);
        $messages = SupportMessage::where('support_id', $support->id)->latest()->get();

        return view('support.show', compact('support', 'messages'));
    }

    public function open(Support $support)
    {
        $support->update(['status' => 'reopened']);

        return redirect(route('support.index'));
    }

    public function close(Support $support)
    {
        $support->update(['status' => 'closed']);

        return redirect(route('support.index'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('support.create');
    }

    /**
     * @param \App\Http\Requests\SupportStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SupportStoreRequest $request)
    {
        $support = Support::create($request->validated());

        return redirect()->route('support.index');
    }

    /**
     * @param \App\Http\Requests\SupportUpdateRequest $request
     * @param \App\Models\Support                     $support
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SupportUpdateRequest $request, Support $support)
    {
        $support->update($request->validated());

        return redirect()->route('support.index');
    }
}
