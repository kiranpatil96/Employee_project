<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this function shows display list of employee.
        $employee = Employee::all();
        return view('employee_front_end.index')->with('employee',$employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //this function to insert record into database.

        $this->validate($request,[
            'e_name'=>'required',
            'e_address'=>'required',
            'e_contact_no'=>'required',
            'e_email'=>'required',
            'e_designation'=>'required',
            'e_sallary'=>'required'
        ]);

        $employee = new Employee;
        $employee->fill($request->all());
        $query = $employee->save();

         if($query){
            return redirect()->with('success','Inserted Successfully Done!');
         }else{
             return back()->with('Fail','Inserted not Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $EmployeeResource)
    {
        //this function get id for edit and delete the record.
         return view('employee_front_end.edit')->with('employee',
            $EmployeeResource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $EmployeeResource)
    {
        //this function is write for update existing data into databse.
         $this->validate($request,[
            'e_name'=>'required',
            'e_address'=>'required',
            'e_contact_no'=>'required',
            'e_email'=>'required',
            'e_designation'=>'required',
            'e_sallary'=>'required'
        ]);

           $EmployeeResource->fill($request->all());


         if($EmployeeResource->save()){
    return redirect()->route('EmployeeResources.index')->with('success',
        'Updated Successfully Done!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $EmployeeResource)
    {
        //this function for delete one record from database.
         $query =  $EmployeeResource->delete();
        if($query){
            return back()->with('success','Deleted Successfully Done!');
        }
    }
}
