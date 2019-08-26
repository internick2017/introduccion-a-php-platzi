<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use App\Controllers\BaseController;

class IndexController extends BaseController {
    public function index($request) {

        $jobs = Job::all();

        $phpProject = new Project('Blog', 'Laravel blog');

        $projects = [$phpProject];

        $limitMonths = 1;

        $filterFunction = function ($job) use ($limitMonths) {
            return $job['months'] >= $limitMonths;
        };

        $jobs = array_filter($jobs->toArray(), $filterFunction);

        return $this->renderHTML('index.twig', [
            'name' => 'David Granados',
            'jobs' => $jobs
        ]);
    }
}
