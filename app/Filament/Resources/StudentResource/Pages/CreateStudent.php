<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\JenisAgama;
use App\Models\JenisPekerjaan;
use App\Models\JenisPendidikan;
use App\Models\JenisPenghasilan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;

class CreateStudent extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
    
        return $data;
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Identitas Calon Siswa')
                ->schema([
                    TextInput::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->required(),
                    TextInput::make('nama_panggilan')
                        ->label('Nama Panggilan')
                        ->required(),
                    Select::make('tempat_lahir')
                        ->label('Tempat Lahir')
                        ->options(\Indonesia::allCities()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    DatePicker::make('tanggal_lahir')
                        ->label('Tanggal Lahir')
                        ->required(),                
                    Select::make('province_id')
                        ->label('Provinsi')
                        ->options(\Indonesia::allProvinces()->pluck('name', 'id'))
                        ->searchable()
                        ->reactive()
                        ->afterStateUpdated(function (callable $set){
                            $set('city_id', null);
                            $set('district_id', null);
                            $set('village_id', null);
                        }),
                    Select::make('city_id')
                        ->label('Kota')
                        // ->searchable()
                        ->reactive()
                        ->options(function(callable $get){
                            $cities = \Indonesia::findProvince($get('province_id'), ['cities']);
                            if(!$cities){
                                return null;
                            }
                            return $cities->cities->pluck('name','id');})
                        ->afterStateUpdated(function (callable $set){
                            $set('district_id', null);
                        }),
                    Select::make('district_id')
                        ->label('Kecamatan')
                        // ->searchable()
                        ->reactive()
                        ->options(function(callable $get){
                            $districts = \Indonesia::findCity($get('city_id'), ['districts']);
                            if(!$districts){
                                return null;
                            }
                            return $districts->districts->pluck('name', 'id');
                        })
                        ->afterStateUpdated(function (callable $set){
                            $set('village_id', null);
                        }),
                    Select::make('village_id')
                    ->label('Kelurahan')
                    ->required()
                    ->options(function (callable $get){
                        $villages = \Indonesia::findDistrict($get('district_id'), ['villages']);
                        if (!$villages) {
                            return null;
                        }
                        return $villages->villages->pluck('name','id');
                    }),
                    TextInput::make('alamat')
                        ->label('Alamat')
                        ->required(),
                    TextInput::make('kodepos')
                        ->label('Kodepos')
                        ->required(),
                    TextInput::make('nik')
                        ->label('Nomor Induk Kependudukan')
                        ->required()
                        ->rules(['digits:16']),
                    TextInput::make('nkk')
                        ->label('Nomor Kartu Keluarga')
                        ->rules(['digits:16'])
                        ->required(),
                ]),
        Step::make('Identitas Ayah')
            ->schema([
                Select::make('status_ayah')
                    ->label('Status Ayah')
                    ->options([
                        '1' => 'masih hidup',
                        '0' => 'sudah meninggal'
                    ])
                    ->reactive()
                    ->required(),  
                TextInput::make('nama_ayah')
                    ->label('Nama Ayah')
                    ->required(),
                Select::make('agama_ayah')
                    ->label('Agama Ayah')
                    ->options(JenisAgama::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('pendidikan_ayah')
                    ->label('Pendidikan Ayah')
                    ->options(JenisPendidikan::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('pekerjaan_ayah')
                    ->label('Pekerjaan Ayah')
                    ->options(JenisPekerjaan::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('penghasilan_ayah')
                    ->label('Penghasilan Ayah')
                    ->options(JenisPenghasilan::all()->pluck('name', 'id'))
                    ->required(),
                Group::make([
                    TextInput::make('nik_ayah')
                        ->label('NIK Ayah')
                        ->required(),
                    
                    TextInput::make('telp_ayah')
                        ->label('Telp Ayah')
                        ->required(),
                ])->when(
                    fn (callable $get) => $get('status_ayah') === '1',
                ),
            ]),
        Step::make('Identitas Ibu')
            ->schema([
                Select::make('status_ibu')
                    ->label('Status ibu')
                    ->options([
                        '1' => 'masih hidup',
                        '0' => 'sudah meninggal'
                    ])
                    ->reactive()
                    ->required(),  
                Group::make([
                    TextInput::make('nik_ibu')
                        ->label('NIK ibu')
                        ->required(),
                    TextInput::make('nama_ibu')
                        ->label('Nama ibu')
                        ->required(),
                    Select::make('agama_ibu')
                        ->label('Agama ibu')
                        ->options(JenisAgama::all()->pluck('name', 'id'))
                        ->required(),
                    Select::make('pendidikan_ibu')
                        ->label('Pendidikan ibu')
                        ->options(JenisPendidikan::all()->pluck('name', 'id'))
                        ->required(),
                    Select::make('pekerjaan_ibu')
                        ->label('Pekerjaan ibu')
                        ->options(JenisPekerjaan::all()->pluck('name', 'id'))
                        ->required(),
                    Select::make('penghasilan_ibu')
                        ->label('Penghasilan ibu')
                        ->options(JenisPenghasilan::all()->pluck('name', 'id'))
                        ->required(),
                    TextInput::make('telp_ibu')
                        ->label('Telp ibu')
                        ->required(),
                ])->when(
                    fn (callable $get) => $get('status_ibu') === '1',
                ),
            ]),
        Step::make('Unggah Dokumen')
        ->schema([
            FileUpload::make('scan_akta')
            ->acceptedFileTypes($types = ['application/pdf']) // Limit the type of files that can be uploaded using an array of mime types.
            ->directory('tes') // Set a custom directory that uploaded files should be written to.
            ]),
        ];
    }
}
