
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateRoutineTagTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("routine_tag", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('routine_id')->nullable()->unsigned();
						$table->integer('tag_id')->nullable();
						$table->timestamps();
						//$table->foreign("id")->references("id")->on("routines");



						// ----------------------------------------------------
						// -- SELECT [routine_tag]--
						// ----------------------------------------------------
						// $query = DB::table("routine_tag")
						// ->leftJoin("routines","routines.id", "=", "routine_tag.id")
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
                Schema::dropIfExists("routine_tag");
            }
        }
    