<?php

namespace App\Repositories;


interface GuestbookRepositoryInterface
{
    public function bookList() : object;

    public function create($request) : object;

    public function destroy($id) : void;

    public function update($request, $id) : void;

}
