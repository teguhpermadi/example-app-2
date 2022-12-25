<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisAgama
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class JenisAgama extends Model
{
	use \Awobaz\Compoships\Compoships;

	protected $table = 'jenis_agamas';

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->hasMany(Student::class, 'agama_wali');
	}
}
