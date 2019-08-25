<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use App\Controllers\BaseController;

class IndexController extends BaseController {
    public function index($request) {

        $jobs = Job::all();

        $phpProject = new Project('Blog', 'Laravel blog');

        $projects = [$phpProject];

        return $this->renderHTML('index.twig', [
            'name' => 'David Granados',
            'jobs' => $jobs
        ]);
    }
}
