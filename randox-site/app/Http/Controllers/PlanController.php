<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Post;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function getPlans()
    {
        $url = env('API_URL') . '/plan/';
        $data = file_get_contents($url);
        $plans = json_decode($data);

        return view('plans', compact('plans'));
    }

    public function newPlan(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'image' => 'required',
            'info' => 'required',
            'stripe_id' => 'required',
            'price' => 'required',

        ]);

        if($validated){

            $result = $request->image->storeOnCloudinary();


            $plan = new Plan();
            $plan->title = $request->title;
            $plan->info = $request->info;
            $plan->image = $result->getSecurePath();
            $plan->stripe_id = $request->stripe_id;
            $plan->price = $request->price;
            $plan->save();

            return redirect('plans')->with('success', 'Abonnement enregistré !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function deletePlan($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect()->back()->with('success', 'L abonnement a été supprimé avec succès.');
    }


    public function editPlan(Request $request, $id ){

        $plan = Plan::where('id', $id)->first();
        return view("editPlan", compact("plan"));
    }


    public function updatePlan(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:150',
            'image' => 'required',
            'info' => 'required',
            'stripe_id' => 'required',
            'price' => 'required',
        ]);

        if($validated) {
            $result = $request->image->storeOnCloudinary();

            $plan = Plan::where('id', $id)->first();
            $plan->title = $request->title;
            $plan->info = $request->info;
            $plan->image = $result->getSecurePath();
            $plan->stripe_id = $request->stripe_id;
            $plan->price = $request->price;
            $plan->save();

            return redirect('plans')->with('success', 'Abonnement modifié !');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

}
