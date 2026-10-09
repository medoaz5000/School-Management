<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_pic',
        
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static public function getAdmin()
    {
        $return = self::select('users.*')
                        ->where('user_type','=',1)
                        ->where('is_delete','=',0);
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('name','like','%'.Request::get('name').'%'); 
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('email','like','%'.Request::get('email').'%'); 
                        }
                        
        $return = $return->orderBy('id','desc')
                        ->paginate(10);

        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getEmailSingle($email)
    {
        return User::where('email','=', $email)->first();
    }

    public function getProfile()
    {
        if(!empty($this->photo_pic) && file_exists('upload/profile/'.$this->photo_pic))
        {
            return url('upload/profile/'.$this->photo_pic);
        }else{
            return "";
        }
    }

    static public function getStudent()
    {
        $return = self::select('users.*','class.name as class_by_name')
                        ->join('class','users.class_id','=','class.id');
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('users.name','like','%'.Request::get('name').'%')
                                                ->orwhere('users.last_name','like','%'.Request::get('name').'%'); 
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('users.email','like','%'.Request::get('email').'%'); 
                        }
                        if(!empty(Request::get('class')))
                        {
                            $return = $return->where('class.name','like','%'.Request::get('class').'%'); 
                        }
        
                        
        $return = $return->where('users.user_type','=',3)
                        ->where('users.is_delete','=',0)
                        ->orderBy('users.id','desc')
                        ->paginate(10);

        return $return;
    }

    static public function getParent()
    {
         $return = self::select('users.*')
                        ->where('user_type','=',4)
                        ->where('is_delete','=',0);
                       if(!empty(Request::get('name')))
                        {
                            $return = $return->where('users.name','like','%'.Request::get('name').'%')
                                                ->orwhere('users.last_name','like','%'.Request::get('name').'%'); 
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('users.email','like','%'.Request::get('email').'%'); 
                        }
        $return = $return->orderBy('id','desc')
                        ->paginate(10);

        return $return;
    }

     static public function getTeacher()
    {
         $return = self::select('users.*')
                        ->where('user_type','=',2)
                        ->where('is_delete','=',0);
                       if(!empty(Request::get('name')))
                        {
                            $return = $return->where('users.name','like','%'.Request::get('name').'%')
                                                ->orwhere('users.last_name','like','%'.Request::get('name').'%'); 
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('users.email','like','%'.Request::get('email').'%'); 
                        }
        $return = $return->orderBy('id','desc')
                        ->paginate(10);

        return $return;
    }
   
    static public function getSearchStudent()
    {
        if(!empty(Request::get('name')) || !empty(Request::get('email')) || !empty(Request::get('id')))
        {
             $return = self::select('users.*','class.name as class_by_name')
                        ->join('class','users.class_id','=','class.id');
                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('users.name','like','%'.Request::get('name').'%')
                                                ->orwhere('users.last_name','like','%'.Request::get('name').'%'); 
                        }
                        if(!empty(Request::get('id')))
                        {
                            $return = $return->where('users.id','=',Request::get('id')); 
                        }
                        if(!empty(Request::get('email')))
                        {
                            $return = $return->where('users.email','like','%'.Request::get('email').'%'); 
                        }
        
                            
            $return = $return->where('users.user_type','=',3)
                            ->where('users.is_delete','=',0)
                            ->orderBy('users.id','desc')
                            ->limit(50)
                            ->get();

            return $return;
        }
    }
}
