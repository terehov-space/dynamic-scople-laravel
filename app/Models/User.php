<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'createdAt',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopeRegisteredSelectedMonth($q, $months = [])
    {
        if (!$months) {
            $months[] = Carbon::now()->format('Y-m');
        } else {
            foreach ($months as &$month) {
                $month = Carbon::createFromFormat('m', $month)->format('Y-m');
            }
        }

        $q->whereIn(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $months);
    }
}
