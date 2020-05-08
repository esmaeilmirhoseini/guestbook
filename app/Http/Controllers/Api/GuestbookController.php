<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGuestbookPost;
use App\Services\GuestbookServiceInterface;
use App\Guestbook;

class GuestbookController extends Controller
{
    private $guestbookService;

    public function __construct(GuestbookServiceInterface $guestbookService)
    {
        $this->guestbookService = $guestbookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->guestbookService->questbookList();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreGuestbookPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuestbookPost $request)
    {
        return $this->guestbookService->createGuestbook($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->guestbookService->removeGuestbook($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->guestbookService->updateGuestbook($request, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->guestbookService->editGuestbook($id);
    }


}
