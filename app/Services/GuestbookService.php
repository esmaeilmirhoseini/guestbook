<?php

namespace App\Services;


use App\Repositories\GuestbookRepositoryInterface;

class GuestbookService implements GuestbookServiceInterface
{
    private $guestbookRepository;

    /**
     * @param \App\Repositories\GuestbookRepositoryInterface $guestbookRepository
     */
    public function __construct(GuestbookRepositoryInterface $guestbookRepository)
    {
        $this->guestbookRepository = $guestbookRepository;
    }

    /**
     * @param \App\Http\Requests\StoreGuestbookPost $request
     * @return object
     */
    public function questbookList(): object{
        return $this->guestbookRepository->bookList();
    }

    /**
     * @param \App\Http\Requests\StoreGuestbookPost $request
     * @return object
     */
    public function createGuestbook($request): object {
        return $this->guestbookRepository->create($request->all());
    }

    /**
     * @param integer $id
     * @return object
     */
    public function removeGuestbook($id): void {
        $this->guestbookRepository->destroy($id);
    }

    /**
     * @param \App\Http\Requests\StoreGuestbookPost $request
     * @param integer $id
     * @return object
     */
    public function updateGuestbook($request, $id): void {
        $this->guestbookRepository->update($request->all(), $id);
    }

    /**
     * @param integer $id
     * @return object
     */
    public function editGuestbook($id): object {
        return $this->guestbookRepository->edit($id);
    }

}
