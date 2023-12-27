<?php

namespace App\Http\Controllers;

use App\Models\m_doctor;
use App\Models\m_doctor_education;
use App\Models\m_medical_facility;
use App\Models\m_medical_facility_category;
use App\Models\m_medical_facility_schedule;
use App\Models\t_doctor_office;
use App\Models\t_doctor_office_treatment;
use App\Models\t_doctor_office_treatment_price;
use App\Models\t_doctor_treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailDoctorController extends Controller
{
    public function index($id){
        $profil = m_doctor::with('biodata')->where('is_delete',false)->where('id',$id)->get();
        $specialization = DB::select("
            SELECT s.name FROM t_current_doctor_specializations c
            join m_doctors d on d.id = c.doctor_id
            join m_specializations s on s.id = c.specialization_id
            where d.id = $id  
        "); // masih salah (seharusnya str)
        $education = m_doctor_education::with('doctor')->where('is_delete',false)->where('doctor_id',$id)->get();
        // $office = t_doctor_office::with(
        //                         'doctor',
        //                         'medicalFacility.medicalFacilityCategory')
        //                         ->where('is_delete',false)->where('doctor_id',$id)->get();

        $office = t_doctor_office::with(
                                'doctor',
                                'medicalFacility.medicalFacilityCategory',
                                'medicalFacility.location.level',
                                'medicalFacility.schedule')
        
                                ->where('is_delete',false)->where('doctor_id',$id)->get();
        $medis = t_doctor_treatment::where('doctor_id',$id)->where('is_delete',false)->get();
        $offices = t_doctor_office_treatment::with(
                                'doctorTreatment',
                                'doctorOffice.medicalFacility.medicalFacilityCategory',
                                'doctorOffice.doctor.biodata',
                                'doctorOffice.medicalFacility.location')
                                ->where('is_delete',false)->where('doctor_office_id',$id)->get();
        
        $ex = DB::select(
            "SELECT *  FROM m_doctors d
            join t_doctor_offices tdo on tdo.doctor_id = d.id
            join m_medical_facilities mf on mf.id = tdo.medical_facility_id
            join m_medical_facility_schedules mfs on mfs.medical_facility_id = mf.id
            where tdo.doctor_id = $id;
        ");

        $schedules = m_medical_facility_schedule::where('is_delete',false)->get(); 

        $schedule = DB::select(
            "SELECT *  FROM m_doctors d
            join t_doctor_offices tdo on tdo.doctor_id = d.id
            join m_medical_facilities mf on mf.id = tdo.medical_facility_id
            join m_medical_facility_schedules mfs on mfs.medical_facility_id = mf.id
            where tdo.doctor_id = $id;"
        );    

        $pricess = DB::select(
            "SELECT dotp.price  FROM t_doctor_office_treatment_prices dotp
            join t_doctor_office_treatments dot on dot.id = dotp.doctor_office_treatment_id
            where dotp.id = $id;"
        );
        $prices = DB::select(
            "SELECT dotp.price  FROM m_doctors d
            join t_doctor_offices tdo on tdo.doctor_id = d.id
            join t_doctor_office_treatments dot on dot.doctor_office_id = tdo.id
            join t_doctor_office_treatment_prices dotp on dotp.doctor_office_treatment_id = dot.id  
            where tdo.doctor_id = $id;"
        );

        // $prices = DB::table('m_doctors')
        //     ->join('m_biodatas', 'm_biodatas.id', '=', 'm_doctors.biodata_id')
        //     ->join('t_doctor_offices','m_doctors.id', '=', 't_doctor_offices.doctor_id')
        //     ->join('m_medical_facilities', 'm_medical_facilities.id', '=', 't_doctor_offices.medical_facility_id') 
        //     ->join('m_locations', 'm_locations.id', '=', 'm_medical_facilities.location_id')
        //     ->join('m_location_levels', 'm_location_levels.id', '=', 'm_locations.location_level_id' )
        //     ->join('m_medical_facility_categories', 'm_medical_facility_categories.id', '=', 'm_medical_facilities.medical_facility_category_id')
        //     ->join('t_doctor_office_treatments','t_doctor_offices.id', '=', 't_doctor_office_treatments.doctor_office_id')
        //     ->join('t_doctor_office_treatments_prices', 't_doctor_office_treatments.id','=', 't_doctor_office_treatments_prices.doctor_office_treatment_id')
        //     ->join('t_doctor_office_schedules', 'm_doctors.id', '=' ,'t_doctor_office_schedules.doctor_id')
        //     ->join('m_medical_facilities_schedules', 't_doctor_office_schedules.medical_facility_schedule_id', '=', 'm_medical_facilities_schedules.id')
        //     ->select(
        //         't_doctor_offices.start_date',
        //         't_doctor_offices.end_date',
        //         'm_medical_facilities_schedules.day',
        //         't_doctor_office_treatments_prices.price'
        //     )
        //     ->where('m_doctors.id', $id)
        //     ->where('is_delete', false)
        //     ->groupBy(
        //         'm_medical_facilities.full_address',
        //         't_doctor_offices.start_date',
        //         't_doctor_offices.end_date',
        //         'm_medical_facilities_schedules.day'
        //     )
        //     ->get();

        // return response()->json($office);
        return view('detail-dokter.index', [
                        'profil'=>$profil,
                        'specialization'=>$specialization,
                        'education'=>$education,
                        'office'=>$office,
                        'offices'=>$offices,
                        'medis'=>$medis,
                        // 'price'=>$price,
                        'prices'=>$prices,
                        'schedule'=>$schedule
                    ]);
    }
}
