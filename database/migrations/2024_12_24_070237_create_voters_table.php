<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            // Specify custom primary key
            $table->id('voter_id'); // Renaming primary key to 'voter_id'
            
            // Define other columns as per the model
            $table->string('voter_name'); // Renamed 'name' to 'voter_name'
            $table->date('date_of_birth'); // Renamed 'dob' to 'date_of_birth'
            $table->string('gender');
            $table->string('contact_information'); // Renamed 'contact' to 'contact_information'
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
