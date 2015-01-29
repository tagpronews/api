<?php namespace TagProNews\Http\Controllers;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//		$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return $this->simple('Welcome to the API');
    }

    public function badRequest()
    {
        return $this->error(['This broke!', 'And that!', 'You can\' go here!'], 403);
    }

    public function transformExample()
    {
        $data = [
            [
                'name' => 'frank',
                'colour' => 1
            ],
            [
                'name' => 'fred',
                'colour' => 0
            ],
            [
                'name' => 'bob',
                'colour' => 1
            ],
            [
                'name' => 'phil',
                'colour' => 1
            ],
        ];

        return $this->setMeta(['count' => count($data)])->transform('BasicTransformer', $data);
    }

    public function transformItemExample()
    {
        $data = [
            'name' => 'frank',
            'colour' => 1
        ];

        return $this->transformItem('BasicTransformer', $data);
    }

}
