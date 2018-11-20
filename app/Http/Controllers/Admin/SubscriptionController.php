<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Api\User;
use App\Models\Plan;
use App\Http\Controllers\Controller;

use App;


class SubscriptionController extends Controller
{

    public function PenddingCompany(Subscription $subscription)
    {
        if ($request -> has('search')) {
            $subscription = Subscription::whereIn('approve', $request -> input('search'))
            ->orderBy('id','desc')
            ->get();
        } else {
            $subscription = App\Models\Subscription::orderBy('id','desc')->get();
        }
        return view('Admin.Company.Pendding',compact('subscription'));
    }

    public function PenddingPlans(Subscription $subscription, Request $request)
    {
        if ($request -> has('search')) {
            $subscription = Subscription::whereIn('approve', $request -> input('search'))
            ->orderBy('id','desc')
            ->get();
        } else {
            $subscription = App\Models\Subscription::orderBy('id','desc')->get();
        }
        return view('Admin.Plan.Request',compact('subscription'));
    }

    public function plans(){
        $plans = Plan::all();
        $companies = User::where('role',User::COMPANY_ROLE)->get();
         return view('Admin.Plan.plans',compact('plans','companies'));
    }


    public function AssignPlans(SubscriptionRequest $request, Subscription $subscription)
    {
        if($request->has('company') == null ){
            $subscription = new Subscription();
            $subscription->company_id = $request->company;
            $subscription->plan_id = $request->plan;
            $subscription->approve = 1;
            $subscription->save();
            return back()->with('success','Plan Assigned Successfully');
        }else{
            $subscription->approve = 1;
            $subscription->update($request->all());
            return back()->with('success','Plan updated Successfully');
         }
    }


    public function PenddingRequest(SubscriptionRequest $request ,$id)
    {
        $subscription = App\Models\Subscription::find($id);
        if($subscription)
        {
            $subscription->approve = 0;
            $subscription->status = "pendding";
            $subscription->save();
            return back()->with('success','Pendding Successfully');
        }
        else{
            return back()->with('error','error to pendding');
        }
    }


    public function ApproveCompany(SubscriptionRequest $request ,$id)
    {
        $subscription = App\Models\Subscription::find($id);
        if($subscription)
        {
            $subscription->approve = 1;
            $subscription->status = "approved";
            $subscription->save();
            return back()->with('success','Approved Successfully');
        }
        else{
            return back()->with('error','did not Approve');
        }
    }


    public function RejectCompany(SubscriptionRequest $request ,$id)
    {
        $subscription = App\Models\Subscription::find($id);
        if($subscription)
        {
            $subscription->approve = 0;
            $subscription->status = "rejected";
            $subscription->save();
            return back()->with('reject','Rejected Successfully');
        }
        else{

            return back()->with('error','did not Rejected');
        }
    }

}
