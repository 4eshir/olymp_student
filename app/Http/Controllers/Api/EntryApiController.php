<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Support\Facades\DB;

class EntryApiController extends Controller
{
    public function getOlympiadEntry()
    {
        $entries = OlympiadEntryWork::all();

        $ids = [];
        $data = [];
        foreach ($entries as $entry)
        {
            $ids[] = $entry->id;
            $data = $entry->getDisplayData();
        }

        return response()->json(['identifiers' => $ids, 'data' => $data]);
    }
}
