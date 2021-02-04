<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\AppUtils;
use App\Models\Icon;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use App\Models\SiteInfo;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    /*
    ####################################
    # Home Area
    ####################################
    */

    /**
     *
     */
    public function home()
    {
        $data = [
            'home_page_1' => SiteInfo::where('code', 'home_page_1')->first(),
            'home_page_2' => SiteInfo::where('code', 'home_page_2')->first(),
            'page' => 'home',
            'page_title' => 'Home',
        ];

        return view('admin.pages.home', $data);
    }

    /**
     *
     */
    public function update_home(Request $request)
    {
        $response = [];

        $home_page_1 = SiteInfo::where('code', 'home_page_1')->first();

        if (!empty($request->home_page_1_title))
            $home_page_1->title = $request->home_page_1_title;

        if (!empty($request->home_page_1_description))
            $home_page_1->description = $request->home_page_1_description;

        if (isset($request->home_page_1_media)) {
            $image = MediaRepository::createImage($request->home_page_1_media, $home_page_1->media);
            $home_page_1->media_id = $image->id;
        }

        $home_page_2 = SiteInfo::where('code', 'home_page_2')->first();

        if (!empty($request->home_page_2_title))
            $home_page_2->title = $request->home_page_2_title;

        if (!empty($request->home_page_2_description))
            $home_page_2->description = $request->home_page_2_description;

        if (isset($request->home_page_2_media)) {
            $image = MediaRepository::createImage($request->home_page_2_media, $home_page_2->media);
            $home_page_2->media_id = $image->id;
        }

        $home_page_1->save();
        $home_page_2->save();

        $response['status'] = 'ok';
        $response['message'] = "success";
        $response['redirect'] = route('admin.pages.home');

        return response()->json($response);
    }

    /*
    ####################################
    # About Area
    ####################################
    */

    /**
     *
     */
    public function history()
    {
        $data = [
            'history_page' => SiteInfo::where('code', 'history_page')->first(),
            'page' => 'about',
            'page_title' => 'Quem Somos',
        ];

        return view('admin.pages.history', $data);
    }

    /**
     *
     */
    public function update_history(Request $request)
    {
        $response = [];

        $history_page = SiteInfo::where('code', 'history_page')->first();

        if (empty($request->title) || empty($request->description)) {
            $response['status'] = 'warning';
            $response['message'] = 'preencha todos os campos';
            return response()->json($response);
        }

        if ($history_page) {
            if ($request->about_bio_title)
                $history_page->title = $request->title;

            if ($request->description)
                $history_page->description = $request->description;

            if (isset($request->media)) {
                $image = MediaRepository::createImage($request->media, $history_page->media);
                $history_page->media_id = $image->id;
            }

            $history_page->save();

            $response['status'] = 'ok';
            $response['message'] = 'sucesso ao atualizar as informações';
            $response['redirect'] = route('admin.pages.history');
        } else {
            $response['status'] = 'error';
            $response['message'] = 'erro ao tentar atualizar as informações';
        }

        return response()->json($response);
    }

    /*
    ####################################
    # Contact Area
    ####################################
    */

    /**
     *
     */
    public function contact()
    {
        $data = [
            'contact_page' => SiteInfo::where('code', 'contact_page')->first(),
            'page' => 'contact',
            'page_title' => 'Contato',
        ];

        return view('admin.pages.contact', $data);
    }

    /**
     *
     */
    public function update_contact(Request $request)
    {
        $response = [];

        $contact_page = SiteInfo::where('code', 'contact_page')->first();

        if (isset($request->cellphone))
            $contact_page->contact->cellphone = $request->cellphone;

        if (isset($request->cellphone2))
            $contact_page->contact->cellphone2 = $request->cellphone2;

        if (isset($request->phone))
            $contact_page->contact->phone = $request->phone;

        if (isset($request->phone2))
            $contact_page->contact->phone2 = $request->phone2;

        if (isset($request->email))
            $contact_page->contact->email = $request->email;

        if (isset($request->email2))
            $contact_page->contact->email2 = $request->email2;

        if (isset($request->facebook))
            $contact_page->contact->facebook = $request->facebook;

        if (isset($request->instagram))
            $contact_page->contact->instagram = $request->instagram;

        if (isset($request->youtube))
            $contact_page->contact->youtube = $request->youtube;

        if (isset($request->flickr))
            $contact_page->contact->flickr = $request->flickr;

        if (isset($request->twitter))
            $contact_page->contact->twitter = $request->twitter;

        $contact_page->save();
        $contact_page->contact->save();

        $response['status'] = 'ok';
        $response['message'] = 'success';
        $response['redirect'] = route('admin.pages.contact');

        return response()->json($response);
    }
}
