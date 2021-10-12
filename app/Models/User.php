<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * 
 * @property string $id
 * @property string $document
 * @property string $first_name
 * @property string $last_name
 * @property int $movil
 * @property string $address
 * @property string $email
 * @property int $country
 * @property int $status_id
 * @property int $category_id
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Category $category
 * @property Status $status
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject
{
	use \App\Http\Traits\KeysUuid;
    use Notifiable;
	use SoftDeletes;
	protected $table = 'users';
	public $incrementing = false;

	protected $casts = [
		'movil' => 'int',
		'country' => 'int',
		'status_id' => 'int',
		'category_id' => 'int',
        'email_verified_at' => 'datetime'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'document',
		'first_name',
		'last_name',
		'movil',
		'address',
		'email',
		'country',
		'status_id',
		'category_id',
		'email_verified_at',
		'password',
		'remember_token'
	];

	/**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}
}
