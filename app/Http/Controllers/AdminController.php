<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Hash;

    class AdminController extends Controller
    {
            public function index()
        {
            $users = User::paginate(10);
            return view('backend.pages.admin',compact('users'));

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('backend.pages.adminInsert');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

             $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|email',
            'password' => 'required',
            ]);

            User::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request['password']),

            ]);

            return back()->with('success','Admin Created Successfully');
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
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
           $user = User::find($id);
           return view('backend.pages.adminUpdate',compact('user'));
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
             if($request->password != ''){
                User::where('id', $id)->update([
                    'name' =>$request->name,
                    'email' =>$request->email,
                    'password' =>Hash::make($request['password']),

                ]);
            }
            else{
                User::where('id', $id)->update([
                    'name' =>$request->name,
                    'email' =>$request->email,

                ]);
            }
            return redirect()->route('backend.admin.index')->with('success', 'Admin Update Successfully!');
        }



        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(User $user, $id)
        {
            $user = User::find($id);
             $user->delete();

            return back()->with('success', 'Admin Deleted Successfully!');
        }
    }
