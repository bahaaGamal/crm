<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CreateCustomer;
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($customerId)
    {
        return Note::where('customer_id',$customerId)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $customerId)
    {
        $note = new Note();
        $note->note = $request->get('note');
        $note->customer_id = $customerId;
        $note->save();

        return $note;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Note::find($id) ?? response()->json(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $customerId, $id)
    {
        $note = Note::find($id);

        if(!$note) {
            return response()->json(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
        }
        $customerId = (int)$customerId;

        if($note->customer_id !== $customerId) {
            return response()->json(['status'=> 'Invalid Data'], Response::HTTP_BAD_REQUEST);
        }

        $note->note = $request->get('note');
        $note->save();

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customerId,$id)
    {
        $note = Note::find($id);

        if(!$note) {
            return response()->json(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
        }

        $customerId = (int)$customerId;
        if($note->customer_id !== $customerId) {
            return response()->json(['status'=> 'Invalid Data'], Response::HTTP_BAD_REQUEST);
        }
        $note->delete();

        return response()->json(['status'=> 'deleted'], Response::HTTP_OK);
    }
}
