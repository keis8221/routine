
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateCommentsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("comments", function (Blueprint $table) {

						$table->increments('id');
						$table->string('comment')->nullable();
						$table->integer('user_id')->nullable()->unsigned();
						$table->integer('routine_id')->nullable()->unsigned();
                        $table->timestamps();
						//$table->foreign("user_id")->references("id")->on("users");
						//$table->foreign("routine_id")->references("id")->on("routines");



						// ----------------------------------------------------
						// -- SELECT [comments]--
						// ----------------------------------------------------
						// $query = DB::table("comments")
						// ->leftJoin("users","users.id", "=", "comments.user_id")
						// ->leftJoin("routines","routines.id", "=", "comments.routine_id")
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
                Schema::dropIfExists("comments");
            }
        }
    