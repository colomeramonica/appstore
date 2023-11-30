<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppResource;
use App\Http\Resources\AppsCollection;
use App\Interfaces\AppRepositoryInterface;
use App\Traits\ResponseHelper;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class AppController extends Controller
{
    use ResponseHelper;

    private AppRepositoryInterface $appRepository;

    public function __construct(AppRepositoryInterface $repository)
    {
        $this->appRepository = $repository;
    }

    public function index()
    {
        $apps = $this->appRepository->getAllApps();

        return new AppsCollection($apps);
    }

    /**
     * Creates a new app
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'dev_id' => 'required',
                'description' => 'max:255',
            ]);
    
            $createdApp = $this->appRepository->store($request->all());
    
            if (!$createdApp) {
                throw new BadRequestHttpException('Failed to create app');
            }

            return $this->successResponse([
                'id' => $createdApp->id,
                'name' => $createdApp->name,
                'links' => [
                    'app' => '/app/'.$createdApp->id,
                    'developer' => '/dev/'
                ]
            ]);  

        } catch (ValidationException $e) {
            return$this->errorResponse($e->getMessage(), 400);
        } catch (MethodNotAllowedHttpException $e) {
            return$this->errorResponse($e->getMessage(), 400);
        } catch (\Exception $e) {
            return$this->errorResponse($e->getMessage(), 400);
        }
    }

    public function update(Request $request)
    {

    }

    public function show($appId)
    {
        $app = $this->appRepository->getAppById($appId);
        return new AppResource($app);
    }
}
