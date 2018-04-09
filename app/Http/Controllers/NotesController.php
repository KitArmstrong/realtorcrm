<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    const NOTETYPE = 'CN';

    /**
     * Returns a specific type of notes
     *
     * @param String type of notes
     * @return Array of JSON notes
     */
    private function getNotes($contactId, $noteType) 
    {
        $columns = ['notes.id AS note_id', DB::raw("DATE_FORMAT(notes.updated_at, '%d-%m-%Y') AS date"), 'note'];

        $notes = DB::table('notes')
                    ->join('contacts', 'contacts.id', '=', 'associated_id')
                    ->select($columns)
                    ->where([
                        ['note_type', $noteType],
                        ['associated_id', $contactId],
                        ['user_id', Auth::id()]
                    ])
                    ->orderBy('notes.updated_at', 'desc')
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

    /**
     * Deletes a note
     *
     * @param Request $request
     * @return void
     */
    public function deleteNote(Request $request)
    {
        $noteId = $request->input('noteid');

        DB::table('notes')->where('id', $noteId)->delete();
    }

    /**
     * Edits an existing not from contact table
     *
     * @param Request $request
     * @return void
     */
    public function editNote(Request $request)
    {
        $now = new \DateTime();

        $noteId = $request->input('noteid');
        $newValue = $request->input('newnote');

        DB::table('notes')
            ->where([
                ['id', $noteId],
                ['note_type', self::NOTETYPE]])
            ->update([
                'note' => $newValue,
                'updated_at' => $now->format('Y-m-d H:i:s')]);
    }

    /**
     * Adds a new note from tontact table
     *
     * @param Request $request
     * @return void
     */
    public function addNewNote(Request $request)
    {
        $contactId = $request->input('contactid');
        $note = $request->input('note');

        $this->addNote($contactId, $note);

        return response()->json(array(
            'success' => true,
            'errors' => '',
        ));
    }
    
    /**
     * Adds a new note
     *
     * @param Integer $contactId
     * @param String $note
     * @return void
     */
    public function addNote($contactId, $note)
    {
        if($note && $contactId)
        {
            $now = new \Datetime();

            $noteDetails = [
                'note_type'     => self::NOTETYPE,
                'associated_id' => $contactId,
                'note'          => $note,
                'created_at'    => $now->format('Y-m-d H:i:s'),
                'updated_at'    => $now->format('Y-m-d H:i:s')
            ];
    
            DB::table('notes')->insert($noteDetails);
        }
    }
}