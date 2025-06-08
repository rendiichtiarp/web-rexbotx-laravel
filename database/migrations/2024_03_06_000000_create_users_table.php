<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('uid')->nullable();
            $table->string('username')->unique();
            $table->string('name')->nullable();
            $table->string('password')->default('');
            $table->date('birth_date')->nullable();
            $table->bigInteger('birth_date_time')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('registered')->default(false);
            $table->integer('coin')->default(0);
            $table->integer('xp')->default(0);
            $table->integer('level')->default(0);
            $table->boolean('premium')->default(false);
            $table->bigInteger('premium_expired')->nullable();
            $table->boolean('banned')->default(false);
            $table->bigInteger('banned_expired')->nullable();
            $table->boolean('autolevelup')->default(true);
            $table->text('afk_reason')->nullable();
            $table->bigInteger('afk_timestamp')->nullable();
            $table->integer('win_game')->default(0);
            $table->boolean('has_sent_banned')->default(false);
            $table->boolean('has_sent_cooldown')->default(false);
            $table->boolean('has_sent_requireBotGroupMembership')->default(false);
            $table->bigInteger('last_claim_limit')->default(0);
            $table->bigInteger('last_claim_daily')->default(0);
            $table->bigInteger('last_claim_weekly')->default(0);
            $table->bigInteger('last_claim_monthly')->default(0);
            $table->bigInteger('last_claim_yearly')->default(0);
            $table->integer('login_attempts')->default(0);
            $table->timestamp('last_login_attempt')->nullable();
            $table->bigInteger('lastBeg')->default(0);
            $table->bigInteger('lastWorkTime')->default(0);
            $table->bigInteger('lastMineTime')->default(0);
            $table->bigInteger('lastFishTime')->default(0);
            $table->bigInteger('lastScavenge')->default(0);
            $table->integer('workStreak')->default(0);
            $table->enum('rodlevel', ['bamboo', 'iron', 'gold', 'iridium'])->default('bamboo');
            $table->enum('pickaxe', ['stone', 'iron', 'golden', 'iridium'])->default('stone');
            $table->integer('command_usage_count')->default(0);
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();

            // Indexes
            $table->index(['id', 'password'], 'idx_login');
            $table->index('username', 'idx_username');
            $table->index('rodlevel', 'idx_rodlevel');
            $table->index('pickaxe', 'idx_pickaxe');
            $table->index('lastBeg', 'idx_lastBeg');
            $table->index('lastMineTime', 'idx_lastMineTime');
            $table->index('lastWorkTime', 'idx_lastWorkTime');
            $table->index('lastFishTime', 'idx_lastFishTime');
            $table->index('lastScavenge', 'idx_lastScavenge');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}; 