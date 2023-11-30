<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\MunicipalityWork;
use App\Models\work\OlympiadEntryWork;
use App\Models\work\UserWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function create()
    {
        return view('lk.entry');
    }

    public function store(Request $request)
    {
        $entry = new OlympiadEntryWork();
        $entry->participation_class = $request->participationClass;
        $entry->user_id = Auth::id();

        $entry->children_event_id = 1;

        $entry->save();

        return redirect()->route('profile', ['id' => Auth::id()]);
    }
}
