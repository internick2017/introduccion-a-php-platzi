<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Project;
use App\Controllers\BaseController;
use Respect\Validation\Validator;

class JobController extends BaseController
{
    public function create($request)
    {
        return $this->renderHTML('addJob.twig');
    }

    public function store($request)
    {
        $responseMessage = null;
        $requestData = $request->getParsedBody();
        $jobValidator = Validator::key('title', Validator::stringType()->notEmpty())
                  ->key('description', Validator::stringType()->notEmpty());

        try {
            $jobValidator->assert($requestData);
            $job = new Job();
            $job->title = $requestData['title'];
            $job->description = $requestData['description'];
            $job->save();
            $responseMessage = 'saved!';
        } catch (\Throwable $th) {
            $responseMessage = 'Holy Guacamole';
        }

        return $this->renderHTML('addJob.twig', ['responseMessage' => $responseMessage]);
    }
}
