<?php

namespace App\Http\Controllers\Peserta;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrainingController extends Controller
{
    public function __construct()
    {
        setLocale(LC_ALL, 'IND');
    }

    public function index()
    {
        return view('peserta.history.index')->with('level', 'peserta');
    }
	
	public function dataTableHistoryTraining()
	{
		$model = User::find(Auth::id());
		$jadwal = $model->schedules()->where('broadcast', 1)->where('type', 0)->where('status', 1)->get();
		return DataTables::of($jadwal)
			->editColumn('type', function ($jadwal) {
				if ($jadwal->type == 0) {
					return '<span class="label label-success">Online</span>';
				} else {
					return '<span class="label label-success">Offline</span>';
				}
			})
			->editColumn('date_from', function ($jadwal) {
				if($jadwal->type == 0){
					return $jadwal->date_from ? with(new Carbon($jadwal->date_from))->format('d M Y') : '';
				}
				else {
					return $jadwal->date_from ? with(new Carbon($jadwal->date_from))->format('H:i - d M Y') : '';
				}
			})
			->editColumn('date_finish', function ($jadwal) {
				if($jadwal->type == 0){
					return $jadwal->date_finish ? with(new Carbon($jadwal->date_finish))->format('d M Y') : '';
				}
				else {
					return $jadwal->date_finish ? with(new Carbon($jadwal->date_finish))->format('H:i - d M Y') : '';
				}
			})
			->editColumn('status', function ($jadwal) {
				foreach ($jadwal->training_hasil as $v) {
					if ($v->peserta_id == Auth::id()) {
						if ($v->hasil == 0) {
							return '<span class="label label-danger">Belum Lulus</span>';
						} else {
							return '<span class="label label-success">Lulus</span>';
						}
					}
				}
			})
			->editColumn('training', function ($jadwal) {
				if ($jadwal->training->kode == null) {
					$d = $jadwal->updated_at->format('Y') . ' | Kode Tidak Ada | ' . $jadwal->training->nama_training;
				} else {
					$d = $jadwal->updated_at->format('Y') . ' | ' . $jadwal->training->kode . ' | ' . $jadwal->training->nama_training;
				}
				return $d;
			})
      ->editColumn('pre', function ($jadwal) {
	      foreach ($jadwal->training_hasil as $v) {
		      if ($v->peserta_id == Auth::id()) {
			      if ($v->pretest == null) {
				      return '<span class="label label-warning">Belum Training</span>';
			      } else {
				      return '<span class="label label-success">' . $v->pretest . '</span>';
			      }
		      }
	      }
      })
      ->editColumn('post', function ($jadwal) {
				foreach ($jadwal->training_hasil as $v) {
					if ($v->peserta_id == Auth::id()) {
						if ($v->postest == null) {
							return '<span class="label label-warning">Belum Training</span>';
						} else {
							return '<span class="label label-success">' . $v->postest . '</span>';
						}
					}
				}
      })
//			->editColumn('action', function ($jadwal) {
//				foreach ($jadwal->soal_peserta as $v) {
//					if ($v->status != 0) {
//						return '<span class="label label-success">Sudah</span>';
//					} else {
//						return '<a href="' . route('h.training.pretest', $v->schedule->id) . '" class="btn btn-warning btn-sm" title="Ikuti Training"><i class="fa fa-play-circle-o"></i> Klik Disini (Ikuti Training)</a>';
//					}
//				}
//			})
			->addIndexColumn()
			->removeColumn('created_at', 'updated_at')
			->rawColumns(['pre','post','status','type', 'training', 'action'])
			->make(true);
	}
}
