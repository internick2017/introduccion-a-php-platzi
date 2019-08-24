<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class JobController {
    public function create($request) {
        include '../views/addJob.php';
    }

    public function store($request) {
        $requestData = $request->getParsedBody();
        $job = new Job();
        $job->title = $requestData['title'];
        $job->description = $requestData['description'];
        $job->save();

        //header("Location: /david/job/add");
    }
}
