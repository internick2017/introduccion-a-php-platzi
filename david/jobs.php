<?php

use App\Models\{Job, Project};

$jobs = Job::all();

$phpProject = new Project('Blog', 'Laravel blog');

$projects = [$phpProject];
