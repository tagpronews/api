<?php namespace TagProNews\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

/**
 * Class Controller
 * @package TagProNews\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

    /**
     * @var array
     */
    private $metaData = [];

    /**
     * @param $data
     * @return $this
     */
    public function setMeta($data)
    {
        $this->metaData = $data;

        return $this;
    }

    /**
     * @param $class
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function transform($class, $data)
    {
        $transformer = "TagProNews\\Transformers\\" . $class;
        $fractal = new Manager;
        $resource = new Collection($data, new $transformer);

        $content = $fractal->createData($resource)->toArray();
        $content['meta'] = $this->metaData;

        return response()->json($content);
    }

    /**
     * @param $class
     * @param $item
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function transformItem($class, $item)
    {
        $transformer = "TagProNews\\Transformers\\" . $class;
        $fractal = new Manager;
        $resource = new Item($item, new $transformer);

        $content = $fractal->createData($resource)->toArray();
        $content['meta'] = $this->metaData;

        return response()->json($content);
    }

    /**
     * @param $content
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function simple($content)
    {
        $content = ['data' => $content];

        return response()->json($content);
    }

    /**
     * @param $errors
     * @param int $code
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function error($errors, $code = 500)
    {
        $errors = ['errors' => (array)$errors, 'meta' => ['code' => $code]];

        return response()->json($errors, $code);
    }
}
