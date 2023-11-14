<?php

use App\Models\County;
use App\Models\Ethnicity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('surname');
            $table->string('title')->nullable();
            $table->date('dob')->nullable();
            $table->string('id_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->foreignIdFor(Ethnicity::class, 'ethnicity_id')->nullable();
            $table->foreignIdFor(County::class, 'county_id')->nullable();
            $table->string('address')->nullable();
            $table->string('code')->nullable();
            $table->string('telephone_number')->unique()->nullable();
            $table->string('mobile_number')->unique();
            $table->string('email')->unique();
            $table->string('alternative_contact_person')->unique();
            $table->string('living_with_disability')->nullable();
            $table->string('nature_of_disability')->nullable();
            $table->string('disability_reg_no')->nullable();
            $table->string('disability_reg_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
