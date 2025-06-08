<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'uid', 'name', 'username', 'password', 'birth_date', 'birth_date_time',
        'age', 'registered', 'coin', 'xp', 'level', 'premium',
        'premium_expired', 'banned', 'banned_expired', 'autolevelup',
        'afk_reason', 'afk_timestamp', 'win_game', 'has_sent_banned',
        'has_sent_cooldown', 'has_sent_requireBotGroupMembership',
        'last_claim_limit', 'last_claim_daily', 'last_claim_weekly',
        'last_claim_monthly', 'last_claim_yearly', 'login_attempts',
        'last_login_attempt', 'lastBeg', 'lastWorkTime', 'lastMineTime',
        'lastFishTime', 'lastScavenge', 'workStreak', 'rodlevel',
        'pickaxe', 'command_usage_count', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'birth_date_time' => 'integer',
        'age' => 'integer',
        'registered' => 'boolean',
        'coin' => 'integer',
        'xp' => 'integer',
        'level' => 'integer',
        'premium' => 'boolean',
        'premium_expired' => 'integer',
        'banned' => 'boolean',
        'banned_expired' => 'integer',
        'autolevelup' => 'boolean',
        'afk_timestamp' => 'integer',
        'win_game' => 'integer',
        'has_sent_banned' => 'boolean',
        'has_sent_cooldown' => 'boolean',
        'has_sent_requireBotGroupMembership' => 'boolean',
        'last_claim_limit' => 'integer',
        'last_claim_daily' => 'integer',
        'last_claim_weekly' => 'integer',
        'last_claim_monthly' => 'integer',
        'last_claim_yearly' => 'integer',
        'login_attempts' => 'integer',
        'last_login_attempt' => 'datetime',
        'lastBeg' => 'integer',
        'lastWorkTime' => 'integer',
        'lastMineTime' => 'integer',
        'lastFishTime' => 'integer',
        'lastScavenge' => 'integer',
        'workStreak' => 'integer',
        'command_usage_count' => 'integer'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate UID jika belum ada
            if (empty($model->uid)) {
                $model->uid = Str::substr(Str::uuid(), 0, 10);
            }

            // Set default values untuk user baru
            $model->level = 1;
            $model->coin = 200;
            $model->registered = true;
            $model->autolevelup = true;
            $model->xp = 0;
            $model->win_game = 0;
            $model->rodlevel = 'bamboo';
            $model->pickaxe = 'stone';
            $model->role = 'user';
        });
    }
} 