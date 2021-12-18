
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateTagsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("tags", function (Blueprint $table) {

						$table->increments('id');
						$table->string('name')->nullable();
						$table->timestamps();
						//$table->foreign("id")->references("id")->on("routine_tag");



						// ----------------------------------------------------
						// -- SELECT [tags]--
						// ----------------------------------------------------
						// $query = DB::table("tags")
						// ->leftJoin("routine_tag","routine_tag.id", "=", "tags.id")
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
                Schema::dropIfExists("tags");
            }
        }
    