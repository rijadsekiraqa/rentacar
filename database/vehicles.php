<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('vehicles', function ($table) {
    $table->id();
    $table->string('name', 30);
    $table->string('brandname', 30);
    $table->string('overview', 255);
    $table->integer('price');
    $table->string('fuel');
    $table->integer('year');
    $table->integer('seat');
    $table->boolean('airconditioner');
    $table->boolean('powerdoorlocks');
    $table->boolean('antilockbrakingsystem');
    $table->boolean('brakeassist');
    $table->boolean('powersteering');
    $table->boolean('driverairbag');
    $table->boolean('passengerairbag');
    $table->boolean('powerwindows');
    $table->boolean('cdplayer');
    $table->boolean('centralock');
    $table->boolean('crashsensor');
    $table->boolean('leatherseats');
    $table->timestamps();
});