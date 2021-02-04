<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /*
    #################################
    # Views
    #################################
    */

    /**
     *
     */
    public function team()
    {
        return view('admin.team.team', [
            'page' => 'team',
            'page_title' => 'Colaboradores'
        ]);
    }

    /**
     *
     */
    public function new()
    {
        return view('admin.team.member', [
            'page' => 'team-new',
            'page_title' => 'Novo colaborador'
        ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = [
            'page' => 'team-edit',
            'page_title' => 'Editar colaborador',
            'member' => Team::find($id)
        ];

        return view('admin.team.member', $data);
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
            $result = Team::orderBy('created_at', 'desc')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%')
                ->orWhere('about', 'like', '%' . $search . '%')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = count($result);
            $response['recordsFiltered'] = count($result);
        } else {
            $result = Team::orderBy('created_at', 'desc')
                ->skip($start)
                ->take($length)
                ->get();

            $response['recordsTotal'] = Team::count();
            $response['recordsFiltered'] = Team::count();
        }

        $i = 0;
        foreach ($result as $res) {
            $actions = '
                <div>
                    <div class="actions text-center">
                        <a href="' . route('admin.team.edit', $res->id) . '" class="btn btn-round btn-warning btn-icon btn-sm edit">
                            <i class="fa fa-edit"></i>                                        
                        </a>
                        <a href="' . route('admin.team.delete', $res->id) . '" class="btn btn-round btn-danger btn-icon btn-sm remove">
                            <i class="fa fa-minus"></i>                                        
                        </a>
                    </div>
                </td>
            ';

            $data = (object)[
                ++$i,
                isset($res->name) ? $res->name : '',
                isset($res->lastname) ? $res->lastname : '',
                isset($res->about) ? $res->about : '',
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

        if (!isset($request->name)) {
            $response['status'] = 'error';
            $response['message'] = 'campo nome obrigatório';
            return response()->json($response);
        }

        if (!isset($request->lastname)) {
            $response['status'] = 'error';
            $response['message'] = 'campo sobrenome obrigatório';
            return response()->json($response);
        }

        if (!isset($request->about)) {
            $response['status'] = 'error';
            $response['message'] = 'campo sobre obrigatório';
            return response()->json($response);
        }

        if (!isset($request->image)) {
            $response['status'] = 'error';
            $response['message'] = 'campo imagem obrigatório';
            return response()->json($response);
        }

        $image = MediaRepository::createImage($request->image);

        $member = Team::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'about' => $request->about,
            'image_id' => $image->id
        ]);

        if ($member) {
            $result['status'] = 'ok';
            $result['message'] = 'sucesso ao criar colaborador';
            $result['redirect'] = route('admin.team');
            $result['data'] = $member;
        } else {
            $result['status'] = 'error';
            $result['message'] = 'erro ao tentar criar colaborador';
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
        $member = Team::find($id);

        if (isset($request->image)) {
            $image = MediaRepository::createImage($request->image, $member->image);
            if (!$image) {
                $response['status'] = 'error';
                $response['message'] = 'falha ao fazer upload da imagem';
                return response()->json($response);
            }
        }

        if (isset($request->name)) {
            $member->name = $request->name;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Nome não encontrado';
            return response()->json($response);
        }

        if (isset($request->lastname)) {
            $member->lastname = $request->lastname;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Sobrenome não encontrado';
            return response()->json($response);
        }

        if (isset($request->about)) {
            $member->about = $request->about;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Sobre não encontrado';
            return response()->json($response);
        }

        $result = [];
        if ($member->save()) {
            $result['status'] = 'ok';
            $result['redirect'] = route('admin.team');
            $result['message'] = 'sucesso ao atualizar colaborador';
        } else {
            $result['status'] = 'error';
            $result['message'] = 'erro ao atualizar colaborador';
        }

        return response()->json($result);
    }

    /**
     *
     */
    public function delete($id)
    {
        $colaborador = Team::find($id);

        if ($colaborador->delete()) {
            return response()->json([
                'status' => 'ok',
                'message' => 'sucesso ao deletar colaborador'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'erro ao deletar colaborador'
            ]);
        }
    }
}
