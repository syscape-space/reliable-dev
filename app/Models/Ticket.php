<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Ticket extends Model {

	protected $table    = 'tickets';
	protected $fillable = [
		'id',
		'admin_id',
		'ticket_title',
		'ticket_linked',

		'link_id',
		'user_id',

		'ticket_content',
		'ticket_status',

		'user_ticket_rate',

		'user_ticket_comment',
		'ticket_department_id',
		'created_at',
		'updated_at',
	];

	public function files() {
		return $this->hasMany(\App\Models\Files::class , 'type_id', 'id')->where('type_file', 'tickets');
	}

	public function replays() {
		return $this->hasMany(\App\Models\TicketReplay::class , 'ticket_id', 'id');
	}

	/**
	 * user_id relation method
	 * @param void
	 * @return object data
	 */
	public function user_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'user_id');
	}

	/**
	 * ticket_department_id relation method
	 * @param void
	 * @return object data
	 */
	public function ticket_department_id() {
		return $this->hasOne(\App\Models\TicketDepartment::class , 'id', 'ticket_department_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($ticket) {
				//$ticket->user_id()->delete();
			});
	}

}
