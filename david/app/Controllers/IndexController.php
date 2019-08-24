<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class IndexController {
    public function index($request) {

        $jobs = Job::all();

        $phpProject = new Project('Blog', 'Laravel blog');

        $projects = [$phpProject];

        include '../views/index.php';
    }
}
