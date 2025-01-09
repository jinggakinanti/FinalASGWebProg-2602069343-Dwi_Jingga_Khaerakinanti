<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gender',
        'age',
        'profession',
        'linkedin',
        'mobile',
        'location',
        'coin',
        'image',
        'email',
        'password',
        'isVisible',
        'isPaid',
        'bear_id',
        'avatar_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function fields(){
        return $this->belongsToMany(Field::class, 'user_fields', 'user_id', 'field_id');
    }
    public function sentRequests()
    {
        return $this->hasMany(Wishlist::class, 'sender_id');
    }   
    public function receivedRequests()
    {
        return $this->hasMany(Wishlist::class, 'receiver_id');
    }
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user1_id', 'user2_id');
    }
    public function sender()
    {
        return $this->hasMany(Notification::class, 'sender_id');
    }   
    public function receiver()
    {
        return $this->hasMany(Notification::class, 'receiver_id');
    }
    public function sentMessages()
    {
        return $this->hasMany(Chat::class, 'user1_id');
    }
    public function receivedMessages()
    {
        return $this->hasMany(Chat::class, 'user2_id');
    }
    public function bear()
    {
        return $this->belongsTo(Bear::class);
    }
    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
    public function avatars()
    {
        return $this->belongsToMany(Avatar::class, 'transactions');
    }
}
