<?php

namespace App\Http\Controllers\Peserta;

use App\Models\TndOnline\TrainingHasil;
use App\Models\TndOnline\TrainingPesertaAct;
use App\Models\TndOnline\TrainingSchedule;
use App\Models\TndOnline\TrainingSoal;
use App\Models\TndOnline\TrainingVideo;
use App\Models\TndOnline\TrainingVideoViews;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        setLocale(LC_ALL, 'IND');
        $level = 'hr';
    }
    
    public function pretest($id) {
        $schedule = TrainingSchedule::find($id);
        $peserta_id = $schedule->training_hasil->pluck('peserta_id')->first();
        $cek = TrainingHasil::where('schedule_id', $id)->where('peserta_id', $peserta_id)->pluck('pretest')->first();
//        dd($cek);

        if ($cek != 0){
            return redirect()->route('h.training.video', $id);
        } else {
            return view('peserta.training.pretest', compact('schedule'))->with('level', 'peserta');
        }
    }

    public function storePretest(Request $request, $id) {
        $schedule = TrainingSchedule::find($id);
        $schedule_id = $request->schedule_id;

        $data = TrainingSoal::where('training_id', $schedule->training->id)->get();
        // nilai jawaban
        $benar = 0;
        foreach($data as $dt){
            $as = 'jawaban'.$dt->id;
            if ($dt->jawaban == $request->input($as)){
                $benar +=1;
            }
        }
        $juml_soal = $data->count();
        $nilai = ($benar / $juml_soal) * 100;
        $nilaiPretest = (round($nilai, 1));

        $user = User::find(Auth::id());
        $karyawan_id = $user->karyawan_id;
        $training_id = $schedule->training->id;
        $trainingAct = $schedule->training_act->where('training_id', $training_id)->where('schedule_id', $schedule_id)->get();
        $trainingAct_id = $trainingAct->pluck('id')->first();
        $pesertaAct_id = TrainingPesertaAct::where('training_act_id',$trainingAct_id)->where('karyawan_id', $karyawan_id)->pluck('id')->first();

        $hasil_id = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('id')->first();

        $hasil = TrainingHasil::find($hasil_id);
        $hasil->kehadiran = true;
        $hasil->pretest = $nilaiPretest;
        if($hasil->save()) {
            $pesertaAct = TrainingPesertaAct::find($pesertaAct_id);
            $pesertaAct->kehadiran = true;
            $pesertaAct->pre = $nilaiPretest;
            $pesertaAct->save();
        }

        Toastr::success('Pretest Telah Berhasil dikerjakan!.', 'Training', ["positionClass" => "toast-top-right"]);
        return redirect()->route('h.training.pretest.nilai', $id);
    }

    public function nilaiPretest($id) {
        $schedule = TrainingSchedule::find($id);
        $peserta_id = $schedule->training_hasil->pluck('peserta_id')->first();
        $cek = TrainingHasil::where('schedule_id', $id)->where('peserta_id', $peserta_id)->pluck('pretest')->first();
        $nilaiPretest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('pretest')->first();

        if ($cek != 0){
            return view('peserta.training.nilai_pretest', compact('schedule','nilaiPretest'))->with('level', 'peserta');
        } else {
            return redirect()->route('h.training.pretest', $id);
        }
    }

    public function postest($id) {
        $schedule = TrainingSchedule::find($id);
        $peserta_id = $schedule->training_hasil->pluck('peserta_id')->first();
        $cek = TrainingHasil::where('schedule_id', $id)->where('peserta_id', $peserta_id)->pluck('postest')->first();

        if ($cek != 0){
            return redirect()->route('h.training.video', $id);
        } else {
            return view('peserta.training.postest', compact('schedule'))->with('level', 'peserta');
        }
    }

    public function updatePostest(Request $request, $id) {
        $schedule = TrainingSchedule::find($id);
        $schedule_id = $request->schedule_id;

        $data = TrainingSoal::where('training_id', $schedule->training->id)->get();
        // nilai jawaban
        $benar = 0;
        foreach($data as $dt){
            $as = 'jawaban'.$dt->id;
            if ($dt->jawaban == $request->input($as)){
                $benar +=1;
            }
        }
        $juml_soal = $data->count();
        $nilai = ($benar / $juml_soal) * 100;
        $nilaiPretest = (round($nilai, 1));

        $user = User::find(Auth::id());
        $karyawan_id = $user->karyawan_id;
        $training_id = $schedule->training->id;
        $trainingAct = $schedule->training_act->where('training_id', $training_id)->where('schedule_id', $schedule_id)->get();
        $trainingAct_id = $trainingAct->pluck('id')->first();
        $pesertaAct_id = TrainingPesertaAct::where('training_act_id',$trainingAct_id)->where('karyawan_id', $karyawan_id)->pluck('id')->first();
        dd($pesertaAct_id);
        $hasil_id = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('id')->first();

        $hasil = TrainingHasil::find($hasil_id);
        $hasil->postest = $nilaiPretest;
        if ($nilaiPretest < 60) {
            $hasil->hasil = false;
        } else {
            $hasil->hasil = true;
        }
        $hasil->status = true;
        if ($hasil->save()){
            $pesertaAct = TrainingPesertaAct::find($pesertaAct_id);
            $pesertaAct->kehadiran = true;
            $pesertaAct->post = $nilaiPretest;
            $pesertaAct->save();
        }

        Toastr::success('Postest Telah Berhasil dikerjakan!.', 'Training', ["positionClass" => "toast-top-right"]);
        return redirect()->route('h.training.evaluation', $id);
    }

    public function nilaiPostest($id) {
        $schedule = TrainingSchedule::find($id);
        $peserta_id = $schedule->soal_peserta->pluck('peserta_id')->first();
        $cek = TrainingHasil::where('schedule_id', $id)->where('peserta_id', $peserta_id)->pluck('postest')->first();
        $nilaiPostest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('postest')->first();

        if ($cek != null){
            return view('peserta.training.nilai_postest', compact('schedule','nilaiPostest'))->with('level', 'peserta');
        } else {
            return redirect()->route('h.training.postest', $id);
        }
    }

    public function video($id) {
        $schedule = TrainingSchedule::find($id);
        $nilaiPretest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('pretest')->first();
        $nilaiPostest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('postest')->first();

        return view('peserta.training.video', compact('schedule', 'nilaiPretest', 'nilaiPostest'))->with('level', 'peserta');
    }

    public function detailModal($id)
    {
        $view = TrainingVideoViews::where('peserta_id', Auth::id())->where('video_id', $id)->get()->count() == 0;

        if ($view) {
            $view = new TrainingVideoViews();
            $view->peserta_id = Auth::id();
            $view->video_id = $id;
            $view->view = true;
            $view->save();
        }

        $view = TrainingVideo::find($id);
        return view('peserta.learning.show', compact('view'))->with('level', 'peserta');
    }

    public function evaluation($id) {
        $schedule = TrainingSchedule::find($id);
        $user = User::find(Auth::id());
        $karyawan_id = $user->karyawan_id;
        $training_id = $schedule->training->id;
        $trainingAct = $schedule->training_act->where('training_id', $training_id)->where('schedule_id', $schedule->id)->get();
        $trainingAct_id = $trainingAct->pluck('id')->first();
        $pesertaAct_id = TrainingPesertaAct::where('training_act_id',$trainingAct_id)->where('karyawan_id', $karyawan_id)->pluck('id')->first();

        $cek = TrainingPesertaAct::where('training_act_id', $training_id)->where('karyawan_id', $karyawan_id)->pluck('duabelas')->first();
        if ($cek != null){
            return redirect()->route('h.training.video', $id);
        } else {
            return view('peserta.training.evaluation', compact('schedule','training_id', 'karyawan_id', 'pesertaAct_id'))->with('level', 'peserta');
        }
    }

    public function storeEvaluation(Request $request, $id) {
        $data = TrainingPesertaAct::find($request->peserta_act_id);
        $nilai = ($data->post - $data->pre);
        $nilaiz = ($nilai/100) * 100;

        $data->efektifitas = $nilaiz;
        $data->satu = $request->jawaban1;
        $data->dua = $request->jawaban2;
        $data->tiga = $request->jawaban3;
        $data->empat = $request->jawaban4;
        $data->lima = $request->jawaban5;
        $data->enam = $request->jawaban6;
        $data->tujuh = $request->jawaban7;
        $data->delapan = $request->jawaban8;
        $data->sembilan = $request->jawaban9;
        $data->sepuluh = $request->jawaban10;
        $data->sebelas = $request->jawaban11;
        $data->duabelas = $request->jawaban12;
        $data->save();

        Toastr::success('Evaluasi Training Berhasil dikerjakan!.', 'Training', ["positionClass" => "toast-top-right"]);
        return redirect()->route('h.training.finish', $id);
    }

    public function finish($id) {
        $schedule = TrainingSchedule::find($id);
        $nilaiPretest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('pretest')->first();
        $nilaiPostest = TrainingHasil::where('schedule_id', $id)->where('peserta_id', Auth::id())->pluck('postest')->first();

        return view('peserta.training.finish', compact('schedule', 'nilaiPretest', 'nilaiPostest'))->with('level', 'peserta');
    }
}
