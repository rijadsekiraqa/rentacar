<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('brands', function ($table) {
    $table->id();
    $table->string('name', 30);
    $table->timestamps();
});