<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {

    	$employees = Employee::latest('id')->paginate();

    	return view('employees.index')->with(['employees' => $employees]);
    }

    public function create() {

    	return view('employees.create');
    }

    public function store(EmployeeRequest $request) {
 		/**
 		 * Mass Assignment
 		 * Object Creation
 		 */
 		$employee = Employee::create([
 			'name'     => $request->input('name'),
 			'email'    => $request->input('email'),
 			'password' => bcrypt($request->input('password')),
 			'address'  => $request->input('address'),
 		]);

 		if ($employee) {
 			return redirect(route('employees-listing'))->with(['message' => 'Employee created successfully!']);
 		}

 		return back()->withInput()->with(['message' => 'Unable to create employee. Please try again!']);
    }

    public function edit(Request $request, $id) {

    	$employee = Employee::findorfail($id);

    	return view('employees.edit')->with(['employee' => $employee]);
    }

    public function update(EmployeeRequest $request, $id) {
        
    	$employee = Employee::findorfail($id);

    	$employee->name     = $request->input('name');
    	$employee->email    = $request->input('email');
    	$employee->address  = $request->input('address');

    	if ($request->has('password')) {
    		$employee->password = bcrypt($request->input('password'));
    	}

    	if ($employee->save()) {
 			return redirect(route('employees-listing'))->with(['message' => 'Employee updated successfully!']);
 		}

 		return back()->withInput()->with(['message' => 'Unable to update employee. Please try again!']);
    }

    public function destroy(Request $request, $id) {
    	
    	$employee = Employee::findorfail($id);

    	if ($employee->delete()) {
    		return redirect(route('employees-listing'))->with(['message' => 'Employee deleted successfully!']);
 		}

 		return back()->withInput()->with(['message' => 'Unable to delete employee. Please try again!']);
    }
}
