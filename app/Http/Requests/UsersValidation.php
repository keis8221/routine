<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\UsersValidation; //Add Controller
//2.  public function store( UsersValidation $request ){ //example
//*************************************************************

class UsersValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //[ *1. default=false ]
    }
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //[ *2. Validation rule description location ]
        return [
				"name" => "nullable", //string('name')->nullable()
				"profile_image" => "nullable", //string('profile_image')->nullable()
				"self_introduction" => "nullable", //string('self_introduction')->nullable()
				"email" => "nullable", //string('email')->nullable()
				"password" => "nullable", //string('password')->nullable()
				"age" => "nullable|integer", //integer('age')->nullable()
				"sex" => "nullable|string", //integer('sex')->nullable()

            ];
        }
    
        //[ *3. Set Validation message (*Optional) ]
        //Be sure to use [messages] for the Function name.
        //[Ja]https://readouble.com/laravel/6.x/ja/validation-php.html
        public function messages(){
            return [
                //"email.required"  => "メールアドレスを入力してください",
                //"email.max"       => "**文字以下で入力してください",
            ];
        }
    
    }



