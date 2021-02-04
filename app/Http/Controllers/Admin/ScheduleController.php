<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\AppUtils;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\Member;
use App\Models\Schedule;
use http\Client\Response;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schedule()
    {
        return view('admin.schedule.schedule', [
            'page' => 'schedule',
            'page_title' => 'Programação'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function table(Request $request)
    {
        $start = (int) $request->start;
        $length = ($request->length !== -1) ? (int)$request->length : 50;
        $search = (isset($request->search['value']) && strlen($request->search['value']) > 0) ? $request->search['value'] : false;

        $response = [];
        $response['draw'] = 0;
        $response['data'] = [];

        if ($search) {
            $result = Schedule::orderBy('created_at', 'desc')
                ->join('addresses', 'schedule.address_id', '=', 'addresses.id')
                ->join('contacts', 'schedule.contact_id', '=', 'contacts.id')
                ->select([
                    'schedule.*',
                    'addresses.week_day',
                    'addresses.time_start',
                    'contacts.time_end'
                ])
                ->where('week_day', 'like', '%' . $search . '%')
                ->orWhere('time_start', 'like', '%' . $search . '%')
                ->orWhere('time_end', 'like', '%' . $search . '%')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = count($result);
            $response['recordsFiltered'] = count($result);
        }
        else {
            $result = Schedule::orderBy('created_at', 'desc')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = Schedule::count();
            $response['recordsFiltered'] = Schedule::count();
        }

        $i = 0;
        foreach ($result as $res) {
            $actions = '
                <div>
                    <div class="actions text-center">
                        <a href="' . route('admin.schedule.edit', $res->id) . '" class="btn btn-round btn-warning btn-icon btn-sm edit">
                            <i class="fa fa-edit"></i>                                        
                        </a>
                        <a href="' . route('admin.schedule.delete', $res->id) . '" class="btn btn-round btn-danger btn-icon btn-sm remove">
                            <i class="fa fa-minus"></i>                                        
                        </a>
                    </div>
                </td>
            ';

            $data = (object) [
                ++$i,
                $res->name,
                Schedule::WEEK_MAP[$res->week_day],
                $res->time_start,
                $res->time_end,
                $actions
            ];
            $response['data'][] = $data;
        }
        return response()->json($response);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        return view('admin.schedule.event', [
            'page' => 'schedule-new',
            'page_title' => 'Novo Evento'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return redirect()->route('admin.schedule');
        }

        $data = [
            'page' => 'schedule-edit',
            'page_title' => 'Editar Evento',
            'schedule' => $schedule
        ];

        return view('admin.schedule.event', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $result = [];
        $data = $request->all();

        try {
            if (empty($request->name)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha o nome';
                return response()->json($result);
            }

            if (empty($request->week_day)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha o dia da semana';
                return response()->json($result);
            }

            if (empty($request->time_start)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha a hora de início';
                return response()->json($result);
            }

            if (empty($request->time_end)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha a hora de término';
                return response()->json($result);
            }

            // create member
            if (Schedule::create($data)) {
                $result['status'] = 'ok';
                $result['message'] = 'sucesso ao criar programação';
                $result['redirect'] = route('admin.schedule');
                $result['data'] = $data;
            }
            else {
                $result['status'] = 'error';
                $result['message'] = 'erro ao tentar criar programação';
            }
        }
        catch (\Exception $e) {
            $result['status'] = 'error';
            $result['message'] = 'erro: ' . $e->getMessage();
        }

        return response()->json($result);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $result = [];
        $data = $request->all();

        try {
            if (empty($request->name)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha o nome';
                return response()->json($result);
            }

            if (empty($request->week_day)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha o dia da semana';
                return response()->json($result);
            }

            if (empty($request->time_start)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha a hora de início';
                return response()->json($result);
            }

            if (empty($request->time_end)) {
                $result['status'] = 'warning';
                $result['message'] = 'Preencha a hora de término';
                return response()->json($result);
            }

            $schedule = Schedule::find($id);

            // create member
            if ($schedule) {
                $schedule->name = $request->name;
                $schedule->week_day = $request->week_day;
                $schedule->time_start = $request->time_start;
                $schedule->time_end = $request->time_end;
                $schedule->save();

                $result['status'] = 'ok';
                $result['message'] = 'Sucesso ao atualizar programação';
                $result['redirect'] = route('admin.schedule');
                $result['data'] = $data;
            }
            else {
                $result['status'] = 'error';
                $result['message'] = 'erro ao tentar criar programação';
            }
        }
        catch (\Exception $e) {
            $result['status'] = 'error';
            $result['message'] = 'erro: ' . $e->getMessage();
        }

        return response()->json($result);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $member = Member::find($id);
        if ($member && $member->delete()) {
            return response()->json([
                'status' => 'ok',
                'message' => 'sucesso ao deletar Programação'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'erro ao deletar Programação'
        ]);
    }
}
