<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /*
    #################################
    # Views
    #################################
    */

    /**
     *
     */
    public function departments()
    {
        return view('admin.departments.departments', [
            'page' => 'departments',
            'page_title' => 'Ministérios'
        ]);
    }

    /**
     *
     */
    public function new()
    {
        return view('admin.departments.department', [
            'page' => 'departments-new',
            'page_title' => 'Novo ministério'
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = [
            'page' => 'departments-edit',
            'page_title' => 'Editar ministério',
            'department' => Department::find($id)
        ];

        return view('admin.departments.department', $data);
    }

    /*
    #################################
    # Ajax
    #################################
    */

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function table(Request $request)
    {
        $start = (int)$request->start;
        $length = ($request->length !== -1) ? (int)$request->length : 50;
        $search = (isset($request->search['value']) && strlen($request->search['value']) > 0) ? $request->search['value'] : false;

        $response = [];
        $response['draw'] = 0;
        $response['data'] = [];

        if ($search) {
            $result = Department::orderBy('created_at', 'desc')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = count($result);
            $response['recordsFiltered'] = count($result);
        } else {
            $result = Department::orderBy('created_at', 'desc')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = Department::count();
            $response['recordsFiltered'] = Department::count();
        }

        $i = 0;
        foreach ($result as $res) {
            $actions = '
                <div>
                    <div class="actions text-center">
                        <a href="' . route('admin.departments.edit', $res->id) . '" class="btn btn-round btn-warning btn-icon btn-sm edit">
                            <i class="fa fa-edit"></i>                                        
                        </a>
                        <a href="' . route('admin.departments.delete', $res->id) . '" class="btn btn-round btn-danger btn-icon btn-sm remove">
                            <i class="fa fa-minus"></i>                                        
                        </a>
                    </div>
                </td>
            ';

            $data = (object)[
                ++$i,
                isset($res->name) ? $res->name : '',
                isset($res->description) ? $res->description : '',
                $actions
            ];

            $response['data'][] = $data;
        }
        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $response = [];

        if (empty($request->name)) {
            $response['status'] = 'error';
            $response['message'] = 'campo nome obrigatório';
            return response()->json($response);
        }

        if (empty($request->description)) {
            $response['status'] = 'error';
            $response['message'] = 'campo descrição obrigatório';
            return response()->json($response);
        }

        if (!isset($request->image)) {
            $response['status'] = 'error';
            $response['message'] = 'campo imagem obrigatório';
            return response()->json($response);
        }

        $image = MediaRepository::createImage($request->image);

        $department = Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'media_id' => $image->id
        ]);

        if ($department) {
            $result['status'] = 'ok';
            $result['message'] = 'sucesso ao criar ministério';
            $result['redirect'] = route('admin.departments');
            $result['data'] = $department;
        } else {
            $result['status'] = 'error';
            $result['message'] = 'erro ao tentar criar ministério';
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
        $department = Department::find($id);

        if (!empty($request->name)) {
            $department->name = $request->name;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'campo nome obrigatório';
            return response()->json($response);
        }

        if (!empty($request->description)) {
            $department->description = $request->description;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'campo descrição obrigatório';
            return response()->json($response);
        }

        if (isset($request->image)) {
            $image = MediaRepository::createImage($request->image, $department->media);
            if (!$image) {
                $response['status'] = 'error';
                $response['message'] = 'falha ao fazer upload da imagem';
                return response()->json($response);
            }
            $department->media_id = $image->id;
        }

        $result = [];
        if ($department->save()) {
            $result['status'] = 'ok';
            $result['redirect'] = route('admin.departments');
            $result['message'] = 'sucesso ao atualizar ministério';
        } else {
            $result['status'] = 'error';
            $result['message'] = 'erro ao atualizar ministério';
        }

        return response()->json($result);
    }

    /**
     *
     */
    public function delete($id)
    {
        $department = Department::find($id);

        if ($department->delete()) {
            return response()->json([
                'status' => 'ok',
                'message' => 'sucesso ao deletar ministério'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'erro ao deletar ministério'
            ]);
        }
    }
}
