<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;

class EmployeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete|employee-show', ['only' => ['index']]);
        $this->middleware('permission:employee-create', ['only' => ['create','store']]);
        $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
        $this->middleware('permission:employee-show', ['only' => ['show']]);
    }
    
    public function index()
    {
        $emps = Employee::all();
        return view('employee.index',compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emps = Employee::all();
        $depts = Department::all();
        $desgs = Designation::all();
        return view('employee.create',compact('emps','depts','desgs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'join' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'department_id' => 'required',
            'designation_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = $validatedData['name'] . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        Employee::create($validatedData);

        return redirect()->route('employee.index')->with('success','Employee has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $depts = Department::all();
        $desgs = Designation::all();
        return view('employee.show',compact('employee','depts','desgs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $depts = Department::all();
        $desgs = Designation::all();
        return view('employee.edit',compact('employee','depts','desgs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'join' => 'required',
            'age' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
    
        $employee->name = $validatedData['name'];
        $employee->email = $validatedData['email'];
        $employee->address = $validatedData['address'];
        $employee->join = $validatedData['join'];
        $employee->age = $validatedData['age'];
        $employee->department_id = $validatedData['department_id'];
        $employee->designation_id = $validatedData['designation_id'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = $validatedData['name'] . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $employee->image = $imageName;
        }
    
        $employee->save();
    
        return redirect()->route('employee.index')->with('success', 'Employee has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee has been deleted successfully');
    }
}
