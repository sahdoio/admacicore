<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\Media;
use App\Models\SiteInfo;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /*
    ###########################
    # View Area
    ###########################
    */

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        $data = [
            'page' => 'blog',
            'page_title' => 'Blog',
            'posts' => BlogPost::all(),
            'site_info' => SiteInfo::all()->first()
        ];

        return view('admin.blog.blog', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        $data  = [
            'page' => 'blog-new',
            'page_title' => 'Nova Publicação'
        ];

        return view('admin.blog.post', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);

        if (!$post) {
            Session::flash('flash_message', 'Publicação não encontrado');
            return redirect()->route('admin.blog');
        }

        $data = [
            'page' => 'blog-edit',
            'page_title' => 'Editar job',
            'post' => $post,
        ];

        return view('admin.blog.post', $data);
    }

    /*
    ###########################
    # Ajax Area
    ###########################
    */

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        if (empty($request->title) || empty($request->body)) {
            return [
                'status' => 'warning',
                'message' => 'preencha o título e o conteúdo'
            ];
        }

        if (isset($request->media)) {
            $media = MediaRepository::createImage($request->media);

            if (!$media) return [
                'status' => 'error',
                'messgae' => 'Erro ao tentar salvar imagem'
            ];
        }
        else {
            return [
                'status' => 'warning',
                'message' => 'Escolha uma imagem para a publicação'
            ];
        }

        $post = BlogPost::create([
            'category_id' => 1,
            'media_id' => isset($media) ? $media->id : null,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body
        ]);

        if ($post) {
            return [
                'status' => 'ok',
                'message' => 'Sucesso ao criar publicação',
                'redirect' => route('admin.blog')
            ];
        }
        else {
            return [
                'status' => 'error',
                'message' => 'Erro ao tentar criar publicação'
            ];
        }

        return response()->json($response);
    }


    /**
     *
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);

        if (!empty($request->title)) {
            $post->title = $request->title;
        }
        else {
            return [
                'status' => 'warning',
                'message' => 'preencha o título'
            ];
        }

        if (!empty($request->body)) {
            $post->body = $request->body;
        }
        else {
            return [
                'status' => 'warning',
                'message' => 'preencha o conteúdo'
            ];
        }

        if (isset($request->media)) {
            $image = MediaRepository::createImage($request->media, $post->media);
            if ($image) {
                $post->media_id = $image->id;
            } else {
                return [
                    'status' => 'warning',
                    'message' => 'falha ao fazer upload da imagem'
                ];
            }
        }

        if ($post->save()) {
            return [
                'status' => 'ok',
                'message' => 'Sucesso ao atualizar publicação',
                'redirect' => route('admin.blog')
            ];
        }
        else {
            return [
                'status' => 'error',
                'message' => 'Erro ao tentar atualizar publicação'
            ];
        }

        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $job = Job::find($id);

        $jobMedias = JobMedia::where('job_id', $job->id)
            ->orderBy('position')
            ->get();

        foreach ($jobMedias as $jobMedia) {
            $file_path = public_path() . '/' . $jobMedia->media->url;
            if (file_exists($file_path))
                File::delete($file_path);
            $jobMedia->media->delete();
            $jobMedia->delete();
        }

        if ($job->delete()) {
            return response()->json([
                'status' => 'ok',
                'message' => 'sucesso ao deletar job',
                'redirect' => route('admin.blog')
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'erro ao deletar job'
            ]);
        }
    }
}
