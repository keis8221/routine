
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateRoutinesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("routines", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('user_id')->nullable()->unsigned();
						$table->string('title')->nullable();
						$table->string('routine_introduction')->nullable();
						$table->string('routine_image')->nullable();
						$table->timestamps();
						//$table->foreign("user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [routines]--
						// ----------------------------------------------------
						// $query = DB::table("routines")
						// ->leftJoin("users","users.id", "=", "routines.user_id")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("routines");
            }
        }
    