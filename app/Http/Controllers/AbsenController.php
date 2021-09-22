<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use DateTime;
class AbsenController extends Controller
{


    public function absenPulang(){
        $jam_start = "09";
        $menit_start = "00";
        $jam_end = date('H');
        $menit_end = date('i');

        $hasil = (intVal($jam_end) - intVal($jam_start)) * 60 + (intVal($menit_end) - intVal($menit_start));
        // $hasil = $hasil / 60;
        // $hasil = number_format($hasil,2);

        if($hasil > 0){
            $telat=1;
        }else{
            $telat=0;
        }

        $start_date = '09:00';
        $end_date = '17:00';
        $date_check = date('H:i');
        if ($this->check_in_range($start_date, $end_date, $date_check)) {
            $invalid = 0;
        } else {
            $invalid = 0;
        }

        DB::table('tb_absen')->insert([
            'id_karyawan' => Session::get('idUser'),
            'date_absen' => date('Y-m-d H:i:s'),
            'kategori_absen' => '2',
            'is_invalid' => $invalid,
            'is_telat' => $telat,
            'menit' => $hasil,
            'lat' => 0,
            'lng' => 0,
        ]);
        Session::forget('isAbsen');
        Session::forget('dateAbsen');

        if($hasil < 0){
            Session::flash('peringatan','Anda Telah Melakukan Absen Pulang Lebih Awal'. $hasil .'Menit');

            return redirect('/dashboard');
        }else{
            Session::flash('sukses','Anda Telah Melakukan Absen Pulang');
            return redirect('/dashboard');
        }

    }

    public function absenMasuk(){
            $jam_start = "22";
            $menit_start = "30";
            $jam_end = date('H');
            $menit_end = date('i');

            $hasil = (intVal($jam_end) - intVal($jam_start)) * 60 + (intVal($menit_end) - intVal($menit_start));
            // $hasil = $hasil / 60;
            // $hasil = number_format($hasil,2);

            if($hasil > 0){
                $telat=1;
            }else{
                $telat=0;
            }

            $start_date = '09:00';
            $end_date = '17:00';
            $date_check = date('H:i');
            if ($this->check_in_range($start_date, $end_date, $date_check)) {
                $invalid = 0;
            } else {
                $invalid = 0;
            }
            Session::put('isAbsen', 1);
            Session::put('dateAbsen', date('H:i:s'));
            DB::table('tb_absen')->insert([
                'id_karyawan' => Session::get('idUser'),
                'date_absen' => date('Y-m-d H:i:s'),
                'kategori_absen' => '1',
                'is_invalid' => $invalid,
                'is_telat' => $telat,
                'menit' => $hasil,
                'lat' => 0,
                'lng' => 0,
            ]);
            if($hasil > 0){
                Session::flash('peringatan','Anda Telat Melakukan Absen '. $hasil .' Menit');
                return redirect('/dashboard');
            }else{
                Session::flash('sukses','Anda Telah Melakukan Absen');
                return redirect('/dashboard');
            }
    }

    function check_in_range($start_date, $end_date, $date_from_user) {
        // Convert to timestamp
        $start = strtotime($start_date);
        $end = strtotime($end_date);
        $check = strtotime($date_from_user);

        // Check that user date is between start & end
        return (($start <= $check ) && ($check <= $end));
      }
}
