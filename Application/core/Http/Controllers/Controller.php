<?php

namespace Application\Core\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Application\Core\Http\Response\JsonResponseDefault;
/**
 * Class Controller
 * @package Application\Core\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * @var
     */
    protected $applicationService;

    /**
     * Controller constructor.
     * @param $applicationService
     */
    public function __construct($applicationService)
    {
        $this->applicationService = $applicationService;
        //dd($this->helperAngularModel(new \Domain\Entities\User()));
    }

    /**
     * @return mixed
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $data = $this->applicationService->findAll($filter);
        return $this->sendResponse($data);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function show($userId)
    {
        $data = $this->applicationService->find($userId);
        return $this->sendResponse($data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $post = $this->removeEmpty($post);
        $data = $this->applicationService->create($post);
        return $this->sendResponse($data);
    }

    /**
     * @param Request $request
     * @param $userId
     * @return mixed
     */
    public function update(Request $request, $userId)
    {
        $post = $request->all();
        $post = $this->removeEmpty($post);
        $data = $this->applicationService->update($userId, $post);
        return $this->sendResponse($data);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function destroy($userId)
    {
        $data = $this->applicationService->delete($userId);
        return $this->sendResponse($data);
    }

    public function serialize($entity)
    {
        $json = help()->jms
            ->setMetadataPath(base_path('../Infrastructure/Persistence/Doctrine/Serializations'))
            ->toJson($entity);

        $array = json_decode($json,true);

        return $array;
    }

    protected function sendResponse($data){
        $data = $this->serialize($data);
        return JsonResponseDefault::create(true, $data, 'success', 200);
    }

    public function removeEmpty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->removeEmpty($haystack[$key]);
            }

            if (!is_numeric($haystack[$key]) && empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }

    /**
     * @return array
     */
    public function getSessionData()
    {
        $sessionData = [];
        $request = Request::capture();

        if($request->hasHeader('Authorization'))
        {
            $sessionData = (array)Auth::user()->data;
        }

        return $sessionData;
    }

    public function getRequestAndSessionData()
    {
        $requestAndSessionData = $this->getRequestData();
        $requestAndSessionData['__session'] = $this->getSessionData();
        return $requestAndSessionData;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $request = Request::capture();
        return $request->all();
    }

    ///helper to create angular model
    public function printEntityToAngularModelAttributes($object){
        $reflect = new \ReflectionClass($object);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);

        foreach ($props as $prop) {
            $property = $prop->getName();

            echo "public $property : string; \n";
        }

        echo "\n";
    }


    public function printEntityToAngularModelAttributesSet($object){
        $reflect = new \ReflectionClass($object);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);

        foreach ($props as $prop) {
            $property = $prop->getName();
            echo "this.$property = data.$property || '';\n";
        }

        echo "\n";
    }

    //chamada //$this->helperAngularModel(new \Domain\Entities\PericiaConciliacaoAndamento());
    public function helperAngularModel($object)
    {
        $this->printEntityToAngularModelAttributes($object);
        $this->printEntityToAngularModelAttributesSet($object);

        die('--------END');
    }

}