<?php

namespace App\Http\Controllers;

use App\Incident; //bring in Incident model
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //store incidents associated with current logged in user's id
      $incidents = Incident::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->paginate(5); //descending order

      return view('incidents/index')->with('incidents', $incidents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();

      return view('incidents/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
          'incident_date' => 'required|date',  //must have a date value to submit
          'description' => 'required',    //must have incident description to submit
          'cat_id' => 'required',         //must select a category to submit
        ]);

        //create new incident
        $i = new Incident();
        //store current user_id
        $i->user_id = Auth::id();
        //store incident date
        $i->incident_date = $request->input('incident_date');
        //store incident description
        $i->description = $request->input('description');
        //store category
        $i->cat_id = $request->input('cat_id');
        //save to db
        $saved = $i->save();

        //return to incidents page with success message
        if($saved) {
          return redirect('/incidents')->with('success', 'Incident Created');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //find incident to display
      $i = Incident::findOrFail($id);
      //grab description from category table that corresponds with the category id in the incident table
      $prev_cat = Category::where('id', '=', $i->cat_id)->value('description');

      return view('incidents/show')->with( compact('i', 'prev_cat') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //find incident to edit
      $i = Incident::findOrFail($id);
      $categories = Category::all();
      $prev_cat = Category::where('id', '=', $i->cat_id)->value('description');

      //check for correct user so you cannot manually add edit to url
      if(Auth::user()->user_id !== $i->user_id) {
          return redirect('/incidents')->with('err', 'Unauthorized Page');
      }

      return view('incidents/edit')->with( compact('i', 'categories', 'prev_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //validation
      $this->validate($request, [
        'incident_date' => 'required|date',  //must have a date value to submit
        'description' => 'required',    //must have a description value to submits
        'cat_id' => 'required',         //must select a category to submit
      ]);

      //find incident
      $i = Incident::findOrFail($id);
      //update category
      $i->cat_id = $request->input('cat_id');
      //update date
      $i->incident_date = $request->input('incident_date');
      //update description
      $i->description = $request->input('description');
      //save to db
      $saved = $i->save();

      if($saved) {
        //return to incidents page with a success message stating updated
        return redirect('/incidents')->with('success', 'Incident Updated');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //find incident
      $i = Incident::findOrFail($id);
      //delete incident
      $i->delete();

      return redirect('/incidents')->with('success', 'Incident Removed');
    }
}
