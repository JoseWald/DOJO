<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index(){        
        return view('listings.index',[
            'heading'=>'latest listing',
            'listings'=>Listing::latest()->filter(request(['tag','search']))->simplePaginate(6)
        ]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request){
       
        $formFields = request()->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
             'website'=>'required',
             'email'=>['required','email'],
             'tags'=>'required',
             'description'=>'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $formFields['user_id']= auth()->id();

        Listing::create($formFields);

        
        return redirect('/')->with('message','listing created successfully');
    }

    //Show edit form
    public function edit(Listing $listing){
        
        return view('listings.edit',array('listing'=>$listing));
    }

     //update listing data
     public function update(Request $request,Listing $listing){
        //Make sure loggeed user is owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized action');
        }

        $formFields = request()->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
             'website'=>'required',
             'email'=>['required','email'],
             'tags'=>'required',
             'description'=>'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);

        
        return redirect('/')->with('message','listing updated successfully');
    }

    //Delete a listing
    public function delete(Listing $listing){
            //Make sure loggeed user is owner
            if($listing->user_id != auth()->id()){
                abort(403,'Unauthorized action');
            }
    
            $listing->delete();
            return redirect('/')->with('message','listing deleted successfully');
    }

    //Manage listing
    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listing()->get()]);
    }
}
