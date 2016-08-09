<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Http\Requests;
use App\Http\Requests\EmployerRequest;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::latest('id')->paginate();

        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerRequest $request)
    {
        return $this->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employer Object  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit($employer)
    {
        return view('employers.update', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employer Object  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(EmployerRequest $request, $employer)
    {
        return $this->save($request, $employer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employer Object  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy($employer)
    {
        if ($employer->delete()) {
            $message = ['message' => 'Employer deleted successfully'];
        } else {
            $message = ['message' => 'Unable to delete employer'];
        }

        return back()->with($message);
    }

    private function save($request, $employer = null) {

        if (is_null($employer)) {
            $employer = new Employer;
        }

        $employer->name     = $request->input('name');
        $employer->email    = $request->input('email');

        if ($request->has('password')) {
            $employer->password = bcrypt($request->input('password'));
        }

        if ($employer->save()) {
            return redirect(route('employers.index'))->with(['message' => 'Employer saved successfully!']);
        }

        return back()->withInputs()->with(['message' => 'Unable to save. Please try again!']);
    }
}
