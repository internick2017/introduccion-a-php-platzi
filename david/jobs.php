<?php

require 'app/Models/Job.php';
require 'app/Models/Project.php';

use App\Models\{Job, Project};

$phpJob = new Job('PHP Developer', 'Laravel Development');
$phpJob->setMonths(16);

$pythonJob = new Job('Python Developer', 'Django Development');
$pythonJob->setMonths(16);

$jsJob = new Job('Js Developer', 'Vue Development');
$jsJob->setMonths(12);

$phpProject = new Project('Blog', 'Laravel blog');

$projects = [$phpProject];
$jobs = [$phpJob, $pythonJob, $jsJob];
