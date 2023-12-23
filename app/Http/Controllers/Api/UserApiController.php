<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\api\EducationalInstitutionWorkApi;
use App\Models\api\MunicipalityWorkApi;
use App\Models\work\EducationalInstitutionWork;
use App\Models\work\OlympiadEntryWork;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{
    // Возвращает всех пользователей системы (role: 1 - администраторов, 2 - обучающихся, null - всех)
    public function getUsers($token, $role = null)
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

    // Возвращает все школы с указанным municipality и jurisdiction (id в справочниках БД)
    public function getSchools($token, $municipality = null)
    {
        $schools = EducationalInstitutionWorkApi::where('municipality_id', $municipality)->get();

        $ids = [];
        $data = [];

        foreach ($schools as $school)
        {
            $ids[] = $school->id;
            $data[] = [$school->id, $school->name, $school->municipality->name ? : '', $school->jurisdiction->name ? : ''];
        }

        return response()->json(['id' => $ids, 'data' => $data]);
    }

    // Возвращает все школы с указанным municipality и jurisdiction (id в справочниках БД)
    public function getSchoolsJuri($token, $jurisdiction = null)
    {
        $schools = EducationalInstitutionWorkApi::where('jurisdiction_id', $jurisdiction)->get();

        $ids = [];
        $data = [];

        foreach ($schools as $school)
        {
            $ids[] = $school->id;
            $data[] = [$school->id, $school->name, $school->municipality->name ? : '', $school->jurisdiction->name ? : ''];
        }

        return response()->json(['id' => $ids, 'data' => $data]);
    }


    // Возвращает все школы с указанным municipality и jurisdiction (id в справочниках БД)
    public function getMunicipalities($token)
    {
        $municipalities = MunicipalityWorkApi::all();

        $ids = [];
        $data = [];

        foreach ($municipalities as $municipality)
        {
            $ids[] = $municipality->id;
            $data[] = [$municipality->id, $municipality->name];
        }

        return response()->json(['id' => $ids, 'data' => $data]);
    }

    // Изменяет статус заявки для обучающихся
    public function checkStudents(Request $request)
    {
        var_dump(json_decode(file_get_contents('php://input'))->firstName);
    }
}
