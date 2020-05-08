<?php

namespace App\Services;


interface GuestbookServiceInterface
{
    public function questbookList() : object;

    public function createGuestbook($request) : object;

    public function removeGuestbook($id) : void;

    public function updateGuestbook($request, $id) : void;

    public function editGuestbook($id) : object;

}
