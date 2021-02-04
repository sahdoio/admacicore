<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Department;
use App\Models\MediaType;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\SiteInfo;
use App\Models\Service;
use App\Models\Job;
use App\Models\Client;
use App\Models\Team;
use Flash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;

class WebsiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function react()
    {
        $data = [
            'page' => 'react',
            'page_title' => 'React Page',
        ];

        return view('website.content.react', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $posts = BlogPost::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        $recent_videos = Media::query()
            ->select([
                'medias.*',
                'album_media.album_id'
            ])
            ->join('album_media', 'album_media.media_id', 'medias.id')
            ->where(function($query) {
                $query->where('type_id', MediaType::VIMEO);
                $query->orWhere('type_id', MediaType::YOUTUBE);
            })
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        $recent_images = Media::query()
            ->select([
                'medias.*',
                'album_media.album_id'
            ])
            ->join('album_media', 'album_media.media_id', 'medias.id')
            ->where(function($query) {
                $query->where('type_id', MediaType::PNG);
                $query->orWhere('type_id', MediaType::JPG);
            })
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        $schedules = Schedule::orderBy('week_day')->get();

        $jobs = Job::all();

        $data = [
            'page' => 'home',
            'banners' => Media::banners(),
            'jobs' => $jobs,
            'home_page_1' => SiteInfo::where('code', 'home_page_1')->first(),
            'home_page_2' => SiteInfo::where('code', 'home_page_2')->first(),
            'posts' => $posts,
            'recent_videos' => $recent_videos,
            'recent_images' => $recent_images,
            'schedules' => $schedules
        ];

        return view('website.content.home', $data);
    }

    /**
     *
     */
    public function about()
    {
        $author = SiteInfo::where('code', 'about_page')->first();

        $data = [
            'page' => 'about',
            'page_title' => 'Sobre mim',
            'author' => $author,
        ];

        return view('website.content.about', $data);
    }

    /**
     *
     */
    public function history()
    {
        $history_page = SiteInfo::where('code', 'history_page')->first();

        $data = [
            'page' => 'history',
            'page_title' => 'História',
            'history_page' => $history_page
        ];

        return view('website.content.history', $data);
    }

    /**
     *
     */
    public function team()
    {
        $data = [
            'page' => 'team',
            'page_title' => 'Equipe',
            'team' => Team::all(),
            'departments' => Department::all()
        ];

        return view('website.content.team', $data);
    }

    /**
     *
     */
    public function schedule()
    {
        $schedule_map = Schedule::orderBy('week_day')
            ->get()
            ->mapToGroups(function ($item, $key) {
                return [
                    $item['week_day'] => $item
                ];
            })
            ->map(function ($item, $key) {
                return $item->sortBy('time_start');
            });

        $data = [
            'page' => 'schedule',
            'page_title' => 'Programação',
            'schedule_map' => $schedule_map
        ];

        return view('website.content.schedule', $data);
    }

    /**
     *
     */
    public function album_images()
    {
        $data = [
            'page' => 'album_images',
            'page_title' => 'Álbuns de Imagens',
            'albums' => Album::where('type', Album::TYPE_IMAGE)->get(),
        ];

        return view('website.content.album_images', $data);
    }

    /**
     *
     */
    public function album_image($album_id)
    {
        $album = Album::find($album_id);
        $albums = Album::where('type', Album::TYPE_IMAGE)
            ->where('id', '!=', $album_id)
            ->take(10)
            ->get();

        $data = [
            'page' => 'album_images',
            'page_title' => $album->name,
            'albums' => $albums,
            'album' => $album,
        ];

        return view('website.content.album_image', $data);
    }

    /**
     *
     */
    public function album_videos()
    {
        $data = [
            'page' => 'album_videos',
            'page_title' => 'Álbuns de Vídeos',
            'albums' => Album::where('type', Album::TYPE_VIDEO)->get(),
        ];

        return view('website.content.album_videos', $data);
    }

    /**
     *
     */
    public function album_video($album_id)
    {
        $album = Album::find($album_id);
        $albums = Album::where('type', Album::TYPE_VIDEO)
            ->where('id', '!=', $album_id)
            ->take(10)
            ->get();

        $data = [
            'page' => 'album_videos',
            'page_title' => $album->name,
            'albums' => $albums,
            'album' => $album,
        ];

        return view('website.content.album_video', $data);
    }


    /**
     *
     */
    public function services()
    {
        $data = [
            'page' => 'services',
            'services' => Service::join('medias', 'services.image', '=', 'medias.id')
                ->select('services.*', 'medias.url as image')
                ->get()
        ];

        return view('website.content.services', $data);
    }

    /**
     *
     */
    public function jobs()
    {
        $data = [
            'page' => 'jobs',
            'page_title' => 'Portfólio',
            'jobs' => Job::all()
        ];

        return view('website.content.jobs', $data);
    }

    /**
     *
     */
    public function job($id)
    {
        $job = Job::find($id);

        if (!$job) return view('website.errors.404');

        $data = [
            'page' => 'job',
            'page_title' => $job->title,
            'job' => $job,
            'jobs' => Job::all()
        ];

        return view('website.content.job', $data);
    }

    /**
     *
     */
    public function gallery()
    {
        $images = [];
        for ($i = 1; $i <= 39; $i++) {
            $image = '/uploads/image/2018/07/gal_' . $i . '.png';
            if (file_exists(public_path() . $image))
                $images[] = $image;
        }

        $data = [
            'page' => 'gallery',
            'images' => $images
        ];

        return view('website.content.gallery', $data);
    }

    /**
     *
     */
    public function clients()
    {
        $clients = [
            [
                'client_id' => '1',
                'client_name' => 'Tribunal de Contas',
                'client_image' => '/uploads/image/2018/08/tcontas.png'
            ],
            [
                'client_id' => '2',
                'client_name' => 'Sumaúma Shopping',
                'client_image' => '/uploads/image/2018/08/sumauma.png'
            ],
            [
                'client_id' => '3',
                'client_name' => 'Grupo BR Malls',
                'client_image' => '/uploads/image/2018/08/brmalls.png'
            ],
            [
                'client_id' => '4',
                'client_name' => 'Bemol',
                'client_image' => '/uploads/image/2018/08/bemol.png'
            ],
            [
                'client_id' => '5',
                'client_name' => 'Concorde',
                'client_image' => '/uploads/image/2018/08/concorde.png'
            ],
            [
                'client_id' => '6',
                'client_name' => 'EMAC',
                'client_image' => '/uploads/image/2018/08/emac.png'
            ],
            [
                'client_id' => '7',
                'client_name' => 'HEMOAM',
                'client_image' => '/uploads/image/2018/08/hemoam.png'
            ],
        ];

        $data = [
            'page' => 'clients',
            'clients' => $clients
        ];

        return view('website.content.clients', $data);
    }

    /**
     *
     */
    public function blog(Request $resquest)
    {
        $posts = BlogPost::query();

        $category = null;
        if ($resquest->category) {
            $category = BlogCategory::find($resquest->category);
            $posts->where('category_id', $category->id);
        }

        $posts = $posts->orderBy('created_at', 'DESC')->get();

        $blog_categories = BlogCategory::all();

        $page_title = $category ? 'Blog - ' . $category->name : 'Blog';

        $data = [
            'page' => 'blog',
            'page_title' => $page_title,
            'posts' => $posts,
            'blog_categories' => $blog_categories,
            'category' => $category
        ];

        return view('website.content.blog', $data);
    }

    /**
     *
     */
    public function blog_post($post_id)
    {
        $post = BlogPost::find($post_id);

        $data = [
            'page' => 'blog_post',
            'page_title' => $post->title,
            'post' => $post,
            'blog_categories' => BlogCategory::all()
        ];

        return view('website.content.blog_post', $data);
    }

    /**
     *
     */
    public function contact()
    {
        $data = [
            'site_info' => SiteInfo::join('contacts', 'site_info.contact_id', '=', 'contacts.id')
                ->join('addresses', 'site_info.address_id', '=', 'addresses.id')
                ->select(
                    'site_info.*',
                    'contacts.*',
                    'addresses.*'
                )
                ->first(),
            'page' => 'contact',
            'page_title' => 'Contato'
        ];

        return view('website.content.contact', $data);
    }


    /**
     *
     */
    public function notfound()
    {
        $data = [
            'page' => 'notfound',
            'page_title' => '404 :('
        ];

        return view('website.errors.404', $data);
    }

    /**
     *
     */
    public function building()
    {
        return view('website.building');
    }

    /**
     *
     */
    public function dashboard()
    {
        $pj_data = PessoaJuridica::orderBy('created_at', 'desc')->take(10)->get();
        $pf_data = PessoaFisica::orderBy('created_at', 'desc')->take(10)->get();
        $pj_count = PessoaJuridica::count();
        $pf_count = PessoaFisica::count();

        return view('pages.dashboard', [
            'page' => 'analytics_dashboard',
            'page_title' => 'Dashboard',
            'pj_data' => $pj_data,
            'pf_data' => $pf_data,
            'pj_count' => $pj_count,
            'pf_count' => $pf_count
        ]);
    }
}
