<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property string $id
 * @property string $user_id
 * @property string|null $nama_lengkap
 * @property string|null $nama_panggilan
 * @property int|null $tempat_lahir
 * @property Carbon|null $tanggal_lahir
 * @property string|null $alamat
 * @property int|null $village_id
 * @property string|null $kodepos
 * @property string|null $nis
 * @property string|null $nisn
 * @property string|null $nik
 * @property string|null $nkk
 * @property int|null $status_ayah
 * @property string|null $nik_ayah
 * @property string|null $nama_ayah
 * @property int|null $agama_ayah
 * @property int|null $pendidikan_ayah
 * @property int|null $pekerjaan_ayah
 * @property int|null $penghasilan_ayah
 * @property string|null $telp_ayah
 * @property int|null $status_ibu
 * @property string|null $nik_ibu
 * @property string|null $nama_ibu
 * @property int|null $agama_ibu
 * @property int|null $pendidikan_ibu
 * @property int|null $pekerjaan_ibu
 * @property int|null $penghasilan_ibu
 * @property string|null $telp_ibu
 * @property int|null $hubungan_wali
 * @property string|null $nik_wali
 * @property string|null $nama_wali
 * @property int|null $agama_wali
 * @property int|null $pendidikan_wali
 * @property int|null $pekerjaan_wali
 * @property int|null $penghasilan_wali
 * @property string|null $telp_wali
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property JenisAgama|null $jenis_agama
 * @property JenisHubungan|null $jenis_hubungan
 * @property JenisPekerjaan|null $jenis_pekerjaan
 * @property JenisPendidikan|null $jenis_pendidikan
 * @property JenisPenghasilan|null $jenis_penghasilan
 * @property JenisStatus|null $jenis_status
 * @property IndonesiaCity|null $indonesia_city
 * @property User $user
 * @property IndonesiaVillage|null $indonesia_village
 *
 * @package App\Models
 */
class Student extends Model
{
    use HasFactory, HasUuids;
	use \Awobaz\Compoships\Compoships;

	protected $table = 'students';
	public $incrementing = false;

	protected $casts = [
		'tempat_lahir' => 'int',
		'village_id' => 'int',
		'status_ayah' => 'int',
		'agama_ayah' => 'int',
		'pendidikan_ayah' => 'int',
		'pekerjaan_ayah' => 'int',
		'penghasilan_ayah' => 'int',
		'status_ibu' => 'int',
		'agama_ibu' => 'int',
		'pendidikan_ibu' => 'int',
		'pekerjaan_ibu' => 'int',
		'penghasilan_ibu' => 'int',
		'hubungan_wali' => 'int',
		'agama_wali' => 'int',
		'pendidikan_wali' => 'int',
		'pekerjaan_wali' => 'int',
		'penghasilan_wali' => 'int'
	];

	protected $dates = [
		'tanggal_lahir'
	];

	protected $fillable = [
		'user_id',
		'nama_lengkap',
		'nama_panggilan',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'alamat',
		'village_id',
		'kodepos',
		'nis',
		'nisn',
		'nik',
		'nkk',
		'status_ayah',
		'nik_ayah',
		'nama_ayah',
		'agama_ayah',
		'pendidikan_ayah',
		'pekerjaan_ayah',
		'penghasilan_ayah',
		'telp_ayah',
		'status_ibu',
		'nik_ibu',
		'nama_ibu',
		'agama_ibu',
		'pendidikan_ibu',
		'pekerjaan_ibu',
		'penghasilan_ibu',
		'telp_ibu',
		'hubungan_wali',
		'nik_wali',
		'nama_wali',
		'agama_wali',
		'pendidikan_wali',
		'pekerjaan_wali',
		'penghasilan_wali',
		'telp_wali'
	];

	public function agama_ayah()
	{
		return $this->belongsTo(JenisAgama::class, 'agama_ayah');
	}

	public function agama_ibu()
	{
		return $this->belongsTo(JenisAgama::class, 'agama_ibu');
	}

	public function agama_wali()
	{
		return $this->belongsTo(JenisAgama::class, 'agama_wali');
	}

	public function jenis_hubungan()
	{
		return $this->belongsTo(JenisHubungan::class, 'hubungan_wali');
	}

	public function pekerjaan_ayah()
	{
		return $this->belongsTo(JenisPekerjaan::class, 'pekerjaan_ayah');
	}
	public function pekerjaan_ibu()
	{
		return $this->belongsTo(JenisPekerjaan::class, 'pekerjaan_ibu');
	}
	public function pekerjaan_wali()
	{
		return $this->belongsTo(JenisPekerjaan::class, 'pekerjaan_wali');
	}

	public function pendidikan_ayah()
	{
		return $this->belongsTo(JenisPendidikan::class, 'pendidikan_ayah');
	}
	public function pendidikan_ibu()
	{
		return $this->belongsTo(JenisPendidikan::class, 'pendidikan_ibu');
	}
	public function pendidikan_wali()
	{
		return $this->belongsTo(JenisPendidikan::class, 'pendidikan_wali');
	}

	public function penghasilan_ayah()
	{
		return $this->belongsTo(JenisPenghasilan::class, 'penghasilan_ayah');
	}
	public function penghasilan_ibu()
	{
		return $this->belongsTo(JenisPenghasilan::class, 'penghasilan_ibu');
	}
	public function penghasilan_wali()
	{
		return $this->belongsTo(JenisPenghasilan::class, 'penghasilan_wali');
	}

	public function status_ayah()
	{
		return $this->belongsTo(JenisStatus::class, 'status_ayah');
	}
	public function status_ibu()
	{
		return $this->belongsTo(JenisStatus::class, 'status_ibu');
	}

	public function tempat_lahir()
	{
		return $this->belongsTo(IndonesiaCity::class, 'tempat_lahir');
	}

	// public function user()
	// {
	// 	return $this->belongsTo(User::class);
	// }

	public function indonesia_village()
	{
		return $this->belongsTo(IndonesiaVillage::class, 'village_id');
	}

	public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

	public function user()
    {
        return $this->morphOne(User::class, 'guardable');
    }
}
