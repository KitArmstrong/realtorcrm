<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    const NOTETYPE = 'CN';

    /**
     * Returns notes for a contact
     *
     * @param String type of notes
     * @return Array of JSON notes
     */
    private function getNotes($contactId, $noteType) 
    {
        $columns = ['notes.id AS note_id', DB::raw("DATE_FORMAT(notes.created_at, '%d-%m-%Y') AS date"), 'note'];

        $notes = DB::table('notes')
                    ->join('contacts', 'contacts.id', '=', 'associated_id')
                    ->select($columns)
                    ->where([
                        ['note_type', $noteType],
                        ['associated_id', $contactId],
                        ['user_id', Auth::id()]
                    ])
                    ->orderBy('notes.created_at', 'desc')
                    ->get();

        return $notes->toArray();
    }

    /**
     * Gets a contact's notes
     *
     * @param Request $request
     * @return Array of JSON notes
     */
    public function getContactNotes(Request $request)
    {
        $requestData = $request->all();

        $notes = $this->getNotes($requestData['contactid'], self::NOTETYPE);

        return response()->json($notes);
    }
}