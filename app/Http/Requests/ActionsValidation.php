<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\ActionsValidation; //Add Controller
//2.  public function store( ActionsValidation $request ){ //example
//*************************************************************

class ActionsValidation extends FormRequest
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
				"things" => "nullable", //string('things')->nullable()
				"routine_id" => "nullable|integer", //integer('routine_id')->nullable()
				"minutes" => "nullable|integer", //integer('minutes')->nullable()
				"tool_name" => "nullable", //string('tool_name')->nullable()
				"tool_url" => "nullable", //string('tool_url')->nullable()
				"tool_image" => "nullable", //string('tool_image')->nullable()
				"action_introduction" => "nullable", //string('action_introduction')->nullable()

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



