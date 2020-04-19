<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Programme;
use App\RegCode;
use App\ScrCode;
use App\Registration;
use App\Notification;
use App\Screening;
use App\Student;
use App\Candidate;
use App\Post;
use App\User;
use App\Affiliation;
use App\Slider;
use App\Mail;
use App\Level;
use App\Role;
use App\Album;
use Illuminate\Support\Facades\Auth;

class Platform extends Model
{
    protected $table = 'platform';
    protected $fillable = [
        'session_id',
        'name',
        'title',
        'status',
        'email',
        'url',
        'logo'
    ];

    public $Status = [
        'name',
        'title',
        'status',
        'session',
    ];
    public static function getRemark($mark) {
        $M = 'F';
        if ($mark>=70)
            $M ='A';
        elseif ($mark>=60)
            $M ='B';
        elseif ($mark>=50)
            $M ='C';
        elseif ($mark>=45)
            $M ='D';
      
        return $M;
    }

    public static function convertRemark($mark) {
        $M = 0;

        if ($mark == 'A')
            $M = 5;
        elseif ($mark == 'B')
            $M = 4;
        elseif ($mark == 'C')
            $M = 3;
        elseif ($mark == 'D')
            $M = 2;
      
        return $M;
    }


    public function __construct() {
        $this->name = 'SRCOE SUGS';
    }

    public static function status() {
        return College::find(1)->get()->first();
    }
    public function roles() {
        return Role::where('rank','>',3)->get();
    }
    public function getStatus() {
        return College::where('status',1)->get()->first();
    }
    public function screenings() {
        return Screening::all();
    }

    public function registrations() {
        return Registration::all();
    }
    public function levels(){
        return Level::all();
    }
    public function courses() {
        return Course::all();
    }
    public function notifications() {
        return Notification::all();
    }

    public function coursesPaginate($per_page = 100) {
        return Course::where('id','>',0)
               ->paginate($per_page);
    }

    public function programmes() {
        return Programme::all();
    }
    public function affiliations() {
        return Affiliation::all();
    }

    public function regCodes() {
        return RegCode::all();
    }

    public function regCodesPages() {
    Code::where('status',1)->paginate();
    }

    public function scrCodes() {
        return ScrCode::where('status',1)->get();
    }

    public function scrCodesPages() {
        return ScrCode::where('status',1)->paginate();
    }

    public function students() {
        return Student::where('status',1)->get();
    }

    public function studentsPages($per_pages =100) {
        return Student::where('status',1)
        ->orderBy('level','asc')
        ->paginate($per_pages);
    }

    public function candidates() {
        return Candidate::all();
    }

    public function candidatesPages($per_pages =100) {
        return Candidate::where('status',1)->paginate($per_pages);
    }

    public function admittedsPages($per_pages =100) {
        return Candidate::where('status',3)->paginate($per_pages);
    }

    public function newStaffPages($per_pages =10) {
        return User::where('verified',0)->paginate($per_pages);
    }

    public function admins() {
        return User::where('id','>',0)
        ->get()->map(function($admin){
            return $admin;
        })->reject(function($admin){
            return $admin->role_id && $admin->role->rank>2;
        });
    }

    public function adminsPages($per_pages =100) {
        return User::where('verified','!=',0)->paginate($per_pages);
    }

    public function slider() {
        return Slider::all();
    }

    public function album() {
        return Album::all();
    }

    public function getPosts() {
        return Post::all();
    }

    public function staffs() {
        $admins = array();
        $admins_col = User::all();
        foreach ($admins_col as $admin) {
            if($admin->role_id != null && $admin->role->rank>3){
                array_push($admins, $admin);
            }
        }
        return collect($admins);
    }
    public function newStaffs() {
        $admins = array();
        $admins_col = User::all();
        foreach ($admins_col as $admin) {
            if($admin->verified == 0){
                array_push($admins, $admin);
            }
        }
        return collect($admins);
    }

    public function staffPages($per_pages =100) {
        return User::where('id','>',0)->paginate($per_pages);
    }

    public function posts() {
        return Post::all();
    }

    public function postsPages($per_pages = 20) {
        return Post::where('status','!=',0)->paginate($per_pages);
    } 
    public function userPostPages($per_pages = 20) {
        return Post::where('status','!=',0)
        ->where('user_id',Auth::user()->id)
        ->paginate($per_pages);
    } 

    public function mails() {
        return Post::all();
    }

}