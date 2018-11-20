<?php

namespace App\Http\Controllers\Api\Clients;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Clients\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Api\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $user = auth()->user();
        if ($user->role == User::CLIENT_ROLE) {
            $reservations = $user->UserReservation();
        }
        else {
                $reservations = $user->CompanyReservation();
        }

        if($status === Reservation::STATUS_APPROVED_TEXT) {
            $reservations->where('status',Reservation::STATUS_APPROVED);

        }elseif ($status === Reservation::STATUS_PENDING_TEXT) {
            $reservations->where('status',Reservation::STATUS_PENDING);
        }

        return ReservationResource::collection($reservations->latest()->paginate());
    }

    public function show(Reservation $reservation) {
        return new ReservationResource($reservation);
    }

    public function reservation(ReservationRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $reservation = Reservation::create($data);
        return new ReservationResource($reservation);
    }
}
