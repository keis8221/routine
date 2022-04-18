
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateLikesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("likes", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('user_id')->nullable()->unsigned();
						$table->integer('routine_id')->nullable()->unsigned();
                        $table->timestamps();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("routine_id")->references("id")->on("routines");



						// ----------------------------------------------------
						// -- SELECT [likes]--
						// ----------------------------------------------------
						// $query = DB::table("likes")
						// ->leftJoin("users","users.id", "=", "likes.user_id")
						// ->leftJoin("routines","routines.id", "=", "likes.routine_id")
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
                Schema::dropIfExists("likes");
            }
        }
    