<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use App\Models\Groups;
use App\Models\Friends;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class groupscontroller extends Controller
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id', 'desc')->paginate(3);
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
        return response()->json([
            'success' => true,
            'message'    => 'Daftar data grup teman',
            'data'       => $groups
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:255',

            'id' => 'required|unique:friends|max:255',
            'name' =>'required|numeric',
            'description' => 'required',
        ]);
        $groups = new groups;

        $groups->name = $request->name;

        $groups->description = $request->description;

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group= Group::where('id', $id)->first();
        return view ('group.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group= Groups::where('id', $id)->first();
        return view ('groups.edit', ['group' => $group]);
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
        $request->validate([
            'name' => 'required|unique:groups|max:255',

            'description' => 'required',
        ]);
        Groups::find($id)->update([
        $groups = Groups::create([
            'id' => $request->id,
            'name' => $request->name,

            'description' => $request->description,
            'description'=> $request->description,

        ]);

        return redirect ('/groups');
            if ($groups) {
                return response()->json([
                    'success' => true,
                    'message'    => 'grup Berhasil di tambahkan',
                    'data'       => $groups
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'group Gagal Ditambahkan ',
                    'data'       => $groups
                ], 409); 
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    public function show ($id)
    {
        Groups::find($id)->delete();
        return redirect ('/groups');
        $group = Groups::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data group ',
            'data'       => $group
        ], 200); 
    }
    public function addmember($id)
    {
        $friend= Friends::where('groups_id', '=',0)->get();
        $group= Groups::where('id', $id)->first();
        return view ('groups.addmember', ['group' => $group, 'friend' => $friend]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $friend = Friends::where('id', $request->friend_id)->first();
        Friends::find($friend->id)->update([
            'groups_id' => $id

        ]);

        return redirect ('/groups/addmember/'.$id);
    }

    public function delateaddmember(Request $request, $id)
    {
        //dd($id);
        Friends::find($id)->update([
            'groups_id' => 0

        ]);

        return redirect ('/groups');
        
        public function update(Request $request, $id)
        {
           

            $group = Groups::find($id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data grup telah berhasil di rubah',
                'data'    => $group
            ], 200);
        }
        public function destroy($id)
        {
            $group = Groups::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data grup berhasil di hapus',
                'data'    => $group
            ], 200);
        }

    }

}
