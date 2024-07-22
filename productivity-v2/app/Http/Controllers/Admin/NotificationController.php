<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\storeRequest;
use App\Http\Requests\Notifications\updateRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Notification());

        $notifications = Notification::orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Notifications/Index', [
            'notifications' => $notifications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Notification());

        return Inertia::render('Notifications/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        $this->authorize('create', new Notification());

        Notification::create($request->validated());

        return redirect()->route('notifications.index')->with('message', '¡Notificación creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);

        return Inertia::render('Notifications/Show', [
            'notification' => $notification,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        $this->authorize('update', $notification);

        return Inertia::render('Notifications/Edit', [
            'notification' => $notification
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, Notification $notification)
    {
        $this->authorize('update', $notification);

        $data = $request->validated();
        $notification->update($data);

        return redirect()->route('notifications.index')->with('message', '¡Notificación actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);

        $notification->delete();

        return redirect()->route('notifications.index')->with('message', '
        ¡Notificación eliminada exitosamente!');
    }
}
