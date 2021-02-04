<?php


namespace App\Http\Controllers\Admin;


use App\Libs\AppUtils;
use App\Models\Client;
use App\Models\Album;
use App\Models\AlbumMedia;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use App\Models\SiteInfo;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AlbumImageController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function albums()
    {
        $data = [
            'page' => 'album_images',
            'page_title' => 'Álbuns de Imagens',
            'albums' => Album::where('type', Album::TYPE_IMAGE)->get(),
            'site_info' => SiteInfo::all()->first()
        ];

        return view('admin.album_images.albums', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new()
    {
        $data = [
            'page' => 'albums-new',
            'page_title' => 'Novo Álbum de Imagens',
        ];

        return view('admin.album_images.album', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $album = Album::find($id);

        if (!$album) {
            Session::flash('flash_message', 'album não encontrado');
            return redirect()->route('admin.albums');
        }

        $data = [
            'page' => 'albums-edit',
            'page_title' => 'Editar Álbum de Imagens',
            'album' => $album
        ];

        return view('admin.album_images.album', $data);
    }

    /*
    ###########################
    # Ajax Area
    ###########################
    */

    /**
     *
     */
    public function create(Request $request)
    {
        $response = [];

        if (empty($request->name)) {
            $response['status'] = 'warning';
            $response['message'] = 'Preencha o nome';
            return response()->json($response);
        }

        if (!isset($request->cover_image)) {
            $response['status'] = 'warning';
            $response['message'] = 'Escolha uma imagem de capa';
            return response()->json($response);
        }

        $cover_media = MediaRepository::createImage($request->cover_image);

        $album = Album::create([
            'name' => $request->name,
            'type' => Album::TYPE_IMAGE,
            'cover_media_id' => $cover_media->id
        ]);

        if (isset($request->new_media)) {
            foreach ($request->new_media as $media_id) {
                AlbumMedia::create([
                    'album_id' => $album->id,
                    'media_id' => $media_id
                ]);
            }
        }

        if (isset($request->deleted_media)) {
            foreach ($request->deleted_media as $media_id) {
                MediaRepository::deleteImage($media_id);
            }
        }

        if ($album) {
            $response['status'] = 'ok';
            $response['message'] = 'sucesso ao criar álbum';
            $response['redirect'] = route('admin.album_images');
        } else {
            $response['status'] = 'error';
            $response['message'] = 'erro ao tentar criar álbum';
        }

        return response()->json($response);
    }

    /**
     *
     */
    public function create_image(Request $request)
    {
        $response = [];

        if (!isset($request->image)) {
            $response['status'] = 'error';
            $response['message'] = 'imagem não encontrada';
            return response()->json($response);
        }

        $image = MediaRepository::createImage($request->image);

        if ($image) {
            $html = view('admin.album_images.album_item', ['media' => $image])->render();

            $response['item_obj'] = $image->toArray();
            $response['item_html'] = $html;
            $response['status'] = 'ok';
            $response['message'] = 'sucesso ao criar imagem';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'erro ao tentar criar imagem';
        }

        return response()->json($response);
    }

    /**
     *
     */
    public function update(Request $request, $id)
    {
        $response = [];

        $album = Album::find($id);

        if (!$album) {
            $response['status'] = 'warning';
            $response['message'] = 'Álbum não encontrado';
            return response()->json($response);
        }

        if (empty($request->name)) {
            $response['status'] = 'warning';
            $response['message'] = 'Preencha o nome';
            return response()->json($response);
        }

        $album->name = $request->name;

        if (isset($request->cover_image)) {
            $cover_media = MediaRepository::createImage($request->cover_image, $album->cover_media);
        }

        if (isset($request->new_media)) {
            foreach ($request->new_media as $media_id) {
                AlbumMedia::create([
                    'album_id' => $album->id,
                    'media_id' => $media_id
                ]);
            }
        }

        if (isset($request->deleted_media)) {
            foreach ($request->deleted_media as $media_id) {
                MediaRepository::deleteImage($media_id);
            }
        }

        if ($album->save()) {
            $response['status'] = 'ok';
            $response['message'] = 'sucesso ao atualizar álbum';
            $response['redirect'] = route('admin.album_images');
        } else {
            $response['status'] = 'error';
            $response['message'] = 'erro ao tentar atualizar álbum';
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
        $album = Album::find($id);

        if (!$album) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Álbum não encontrado',
                'redirect' => route('admin.album_images')
            ]);
        }

        MediaRepository::deleteImage($album->cover_media->id);

        foreach ($album->medias as $media) {
           MediaRepository::deleteImage($media->id);
        }

        if ($album->delete()) {
            return response()->json([
                'status' => 'ok',
                'message' => 'sucesso ao deletar album',
                'redirect' => route('admin.album_images')
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'erro ao deletar album'
            ]);
        }
    }
}