
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateFollowsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("follows", function (Blueprint $table) {

						$table->increments('id');
						$table->integer('follower_id')->nullable()->unsigned();
						$table->integer('followee_id')->nullable()->unsigned();
						$table->timestamps();
						//$table->foreign("follower_id")->references("id")->on("users");
						//$table->foreign("followee_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [follows]--
						// ----------------------------------------------------
						// $query = DB::table("follows")
						// ->leftJoin("users","users.id", "=", "follows.follower_id")
						// ->leftJoin("users","users.id", "=", "follows.followee_id")
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
                Schema::dropIfExists("follows");
            }
        }
    