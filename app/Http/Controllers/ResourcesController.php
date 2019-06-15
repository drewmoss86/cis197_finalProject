<?php

namespace App\Http\Controllers;

use App\Resource;
use App\User;
use App\Functions;
use App\SecondaryFunction;
use App\Incident;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ResourcesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //pull all functions from table
        $functions = Functions::all();
        $units = Unit::all();
        //make functions available in view as an array
        return view('resources/create', compact('functions', 'units'));
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
        'pFunc' => 'required',   //must have a primary function value to submit
        'res_name' => 'required', //must have a resource name value to submit
        'cost' => 'required',    //must have cost value to submit
      ]);

      $res = new Resource();

      //store current primary function func_id
      $res->func_id = $request->input('pFunc');
      //store incident date
      $res->name = $request->input('res_name');
      //store incident description
      $res->description = $request->input('description');
      //store category
      $res->capabilities = $request->input('btnCap');
      //store distance from pcc in miles to the 10th of a mile
      $res->distance_from_pcc = $request->input('distance');
      //store cost in dollars
      $res->cost = $request->input('cost');
      //store current user's id
      $res->user_id = Auth::id();
      //store the unit of measure
      $res->unit_id = $request->input('per');
      //save to db
      $saved = $res->save();
      //grab array of secondary functions
      $sFunc = $request->input('sFunc');

      //initialize array for storing secondary_functions
      $addSecFuncs = [];
      //insert each secondary function into secondary_functions table if a secondary function was selected
      if($sFunc[0] != null) {
        foreach ($sFunc as $s) {
          $sFuncs = new SecondaryFunction();
          $sFuncs->resource_id = $res->id;
          $sFuncs->func_id = $s;
          $sFuncs->save();
          //push secondary_functions value into array
          $addSecFuncs[] = Functions::find($sFuncs->func_id);
        }
      }
      //get unit value
      $units = Unit::find($res->unit_id);
      //get primary function
      $pFuncs = Functions::find($res->func_id);
      //return to incidents page with success message
      $request->session()->flash('success', 'New Resource Added!');
      return view('resources/show', compact('addSecFuncs', 'sFuncs', 'res', 'pFuncs', 'units'));
    }

    public function report()
    {
      // this query is equivalent to SELECT functions.SELECT functions.id, functions.description,
      // resource.func_id, resource.user_id, IF(resource.func_id IS NULL, 0, COUNT(*)) AS Total
      // FROM functions LEFT JOIN resource ON (functions.id = resource.func_id) AND resource.user_id = 3
      // GROUP BY functions.id, functions.description, resource.func_id, resource.user_id;
      $report = DB::table('functions')
      ->leftJoin('resource', function($q) {
        $q->on('functions.id', '=', 'resource.func_id')
          ->where('resource.user_id', '=', Auth::user()->user_id);
      })
      ->select('functions.id', 'functions.description', 'resource.func_id', DB::raw('IF(resource.func_id IS NULL, 0, COUNT(*)) total'))
      ->groupBy('functions.id', 'functions.description', 'resource.func_id')
      ->get();

      return view('resources/report', compact('report'));
    }

    public function search(Request $request)
    {
      $functions = Functions::all();
      $incidents = Incident::all();

      //keyword search crawls through the Resource Name, Owner name, Description, and Capabilities in the resource table.
      $keyword = $request->input('keyword');
      //pFunc search crawls through the func_id field in the resource table.
      $pFuncNum = $request->input('pFunc');
      $pFunc = Functions::find($pFuncNum);
      //pFunc search crawls through the distance_from_pcc field in the resource table.
      $distance = $request->input('distance');

      // query only when button has been pressed
      if($request->input('search') != null) {
        // if no values in search field return nothing
        if($keyword == null && $pFunc == null && $distance == null) {
          $resources = Resource::join('user', 'resource.user_id', '=', 'user.user_id')
                                ->join('unit', 'unit.id', '=', 'resource.unit_id')
                                ->orderBy('resource.distance_from_pcc', 'DESC')
                                ->select('resource.id', 'resource.name', 'user.name AS owner', 'resource.cost', 'unit.description AS unit', 'resource.distance_from_pcc AS distance')->get();
        }else {
          //query if distance variable is not null
          $resources = Resource::join('user', 'resource.user_id', '=', 'user.user_id')
          ->join('unit', 'unit.id', '=', 'resource.unit_id')
          ->orderBy('resource.distance_from_pcc', 'DESC')
          ->select('resource.id', 'resource.name', 'user.name AS owner', 'resource.cost', 'unit.description AS unit', 'resource.distance_from_pcc AS distance')
          ->when($distance != null, function($query) use ($distance) {
            return $query->where('resource.distance_from_pcc', '<=', $distance);
          })
          //query if pFunc variable is not null
          ->when($pFuncNum != null, function($query) use ($pFuncNum) {
            return $query->where('resource.func_id', '=', $pFuncNum);
          })
          //query keyword if variable is not null
          ->when($keyword != null, function($query) use ($keyword) {
            $query->where('user.name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('resource.name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('resource.description', 'LIKE', '%'.$keyword.'%')
            ->orWhere('resource.capabilities', 'LIKE', '%'.$keyword.'%');
          })
          ->groupBy('resource.id')
          ->orderBy('resource.distance_from_pcc', 'DESC')
          ->get();
        }
      } else {
        $resources = null;
      }

        return view('resources/search', compact('functions', 'incidents', 'pFunc', 'keyword', 'distance'))->withDetails($resources);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      //find resource to display
      // $res = Resource::all();
      return view('resources/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
      //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
