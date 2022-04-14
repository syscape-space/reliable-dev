<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReplay extends Model {
	use HasFactory;
	protected $table    = 'ticket_replays';
	protected $fillable = [
		'id',
		'ticket_id',
		'admin_id',
		'user_id',
		'replay',
		'seen_status',
		'created_at',
		'updated_at',
	];
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse( $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse( $date)->format('Y-m-d');
    }

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function admin_id() {
		return $this->hasOne(\App\Models\Admin::class , 'id', 'admin_id');
	}

	/**
	 * ticket id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function ticket_id() {
		return $this->hasOne(\App\Models\Ticket::class , 'id', 'ticket_id');
	}

	/**
	 * user id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function user_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'user_id');
	}

	/**
	 * user id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function files() {
		return $this->hasMany(\App\Models\Files::class , 'type_id', 'id')->where('type_file', 'ticket_replays');
	}

}
