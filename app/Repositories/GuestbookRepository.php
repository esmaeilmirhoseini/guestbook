<?php

namespace App\Repositories;

use App\Guestbook;
use App\Repositories\GuestbookRepositoryInterface;
use phpDocumentor\Reflection\Types\Integer;

class GuestbookRepository implements GuestbookRepositoryInterface
{
    private $guestbook;

    /**
     * @param App\Guestbook $guestbook
     */
    public function __construct(Guestbook $guestbook){
        $this->guestbook = $guestbook;
    }

    /**
     * @return object
     */
    public function bookList(): object {
        return $this->guestbook->orderby("id","desc")->paginate(3);
    }

    /**
     * @param \App\Http\Requests\StoreGuestbookPost $request
     * @return object
     */
    public function create($request): object {
        return $this->guestbook->create($request);
    }

    /**
     * @param int $id
     */
    public function destroy($id): void {
        $this->edit($id)->delete();
    }

    /**
     * @param \App\Http\Requests\StoreGuestbookPost $request
     * @param integer $id
     * @return object
     */
    public function update($request, $id): void {
        $this->edit($id)->update($request);
    }

    /**
     * @param integer $id
     * @return object
     */
    public function edit($id): object {
        return $this->guestbook->find($id);
    }

}
