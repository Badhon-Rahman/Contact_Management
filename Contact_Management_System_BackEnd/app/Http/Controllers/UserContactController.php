<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserContacts;
use App\Models\Groups;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserContactController extends Controller
{
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
    public function create()
    {
        //create new user contact
        $newUserContact=UserContacts::all();
        //hashing password
        return $newUserContact;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store new contact
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email_1'=>'required',
            'mobile_1'=>'required'
        ]);

        $newUserContact=new UserContacts($request->only('name', 'email_1', 'email_2', 'mobile_1', 'mobile_2','password', 'group_id', 'isFavorite'));
        $newUserContact->password = Hash::make($newUserContact->password);
        $newUserContact->created_at = date('Y-m-d H:i:s'); 
        $newUserContact->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get contact by id
        $showUserContact=UserContacts::where('id',$id)->get();
        return $showUserContact;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //update user contact info
        $updateUserContact=UserContacts::findOrFail($id);
        $updateUserContact->name = $request->name;
        $updateUserContact->email_1 = $request->email_1;
        $updateUserContact->email_2 = $request->email_2;
        $updateUserContact->mobile_1 = $request->mobile_1;
        $updateUserContact->mobile_2 = $request->mobile_2;
        $updateUserContact->password = Hash::make($request->password);
        $updateUserContact->group_id = $request->group_id;
        $updateUserContact->isFavorite = $request->isFavorite;
        $updateUserContact->updated_at = date('Y-m-d H:i:s'); 
        $updateUserContact->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user contact from list
        $deleteUserContact=UserContacts::where('id',$id)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string/any  name, email, mobile, group
     * @return $userContactInfo
     */
    public function SearchUser(Request $request)
    {
        $searchResult=DB::table('user_contacts')
                ->join('groups', 'user_contacts.group_id', '=', 'groups.id')
                ->where('user_contacts.name', 'LIKE','%' . $request->search . '%')
                ->orWhere('user_contacts.email_1', 'LIKE','%' . $request->search . '%')
                ->orWhere('user_contacts.email_2', 'LIKE','%' . $request->search . '%')
                ->orWhere('user_contacts.mobile_1', 'LIKE','%' . $request->search . '%')
                ->orWhere('user_contacts.mobile_2', 'LIKE','%' . $request->search . '%')
                ->orWhere('groups.name', 'LIKE','%' . $request->search . '%')
                ->select('user_contacts.*', 'groups.name as groupName')
                ->get();

        return $searchResult;                             
    }
}
