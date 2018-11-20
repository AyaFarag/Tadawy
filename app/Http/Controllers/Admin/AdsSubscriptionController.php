<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\AdsSubscriptionRequest;
use App;
use App\Http\Controllers\Controller;
class AdsSubscriptionController extends Controller
{


    public function PenddingAds(Ad $ads, Request $request)
    {
        if ($request -> has('search')) {
            $ads = Ad::whereIn('status', $request->input('search'))
            ->orderBy('id', 'desc')
            ->get();
        } else {
            $ads = Ad::orderBy('id','desc')->get();
        }

        return view('Admin.Ads.Pendding',compact('ads'));
    }


    public function ApproveAds(AdsSubscriptionRequest $request ,$id)
    {
        $ad = Ad::find($id);
        if($ad)
        {
            $ad->ended_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . " " . Ad::$durationsValues[$ad->duration]));
            $ad->status = 1;
            $ad->save();
            return back()->with('success','Ad Approved Successfully');
        }
        else{
            return back()->with('error','Ad didn\'t Approve');
        }
    }

    public function RejectAds(AdsSubscriptionRequest $request ,$id)
    {
        $ads = Ad::find($id);
        if($ads)
        {
            $ads->status = 2;
            $ads->save();
            return back()->with('reject','Ad Rejected Successfully');

        }
        else{
            return back()->with('error','Ad didn\'t Reject');
        }
    }


    // public function ApprovedCompanyPage()
    // {
    //     $approvedcompany = Subscription::where('approve', 1 )->get();
    //     return view('Admin.Company.Approve', compact('approvedcompany'));
    // }



    // public function RejectedCompanyPage()
    // {
    //     $rejectedcompany = Subscription::where('approve', 0 )->get();
    //     return view('Admin.Company.Reject', compact('rejectedcompany'));
    // }
}
