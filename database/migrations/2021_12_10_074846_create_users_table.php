
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateUsersTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("users", function (Blueprint $table) {

						$table->increments('id');
						$table->string('name')->nullable();
						$table->string('profile_image')->nullable();
						$table->string('self_introduction')->nullable();
						$table->string('email')->nullable();
						$table->string('password')->nullable();
						$table->integer('age')->nullable();
						$table->string('sex')->nullable();
                        $table->timestamps();
                        $table->softDelets();

						// ----------------------------------------------------
						// -- SELECT [users]--
						// ----------------------------------------------------
						// $query = DB::table("users")
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
                Schema::dropIfExists("users");
            }
        }
    