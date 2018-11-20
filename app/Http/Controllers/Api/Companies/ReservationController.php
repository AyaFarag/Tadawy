<?php

namespace App\Http\Controllers\Api\Companies;

use App\Models\Reservation;
use App\Models\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Companies\ReservationRequest;
use App\Http\Resources\ReservationResource;

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
        if ($user->role == User::COMPANY_ROLE){
            $reservations = $user->CompanyReservation();
        }
        else {
                $reservations = $user->UserReservation();
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
     
    public function reservation(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->status = 1 ;
        $reservation->update($request->all());
        return new ReservationResource($reservation);
    }
    
}
