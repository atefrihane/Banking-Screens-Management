<?php

use App\Modules\Player\Models\Player;
use Illuminate\Support\Facades\Schema;
use App\Modules\Channel\Models\Channel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Channel::class)->OnDelete('cascade');
            $table->foreignIdFor(Player::class)->OnDelete('cascade');
            $table->timestamp('schedule_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plannings');
    }
}
