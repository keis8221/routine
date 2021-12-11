
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateActionsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("actions", function (Blueprint $table) {

						$table->increments('id');
						$table->string('things')->nullable();
						$table->integer('routine_id')->nullable()->unsigned();
						$table->integer('minutes')->nullable();
						$table->string('tool_name')->nullable();
						$table->string('tool_url')->nullable();
						$table->string('tool_image')->nullable();
						$table->string('action_introduction')->nullable();
						$table->timestamps();
						

                    //*********************************
                    // Foreign KEY [ Uncomment if you want to use!! ]
                    //*********************************
                        //$table->foreign("routine_id")->references("id")->on("routines");



						// ----------------------------------------------------
						// -- SELECT [actions]--
						// ----------------------------------------------------
						// $query = DB::table("actions")
						// ->leftJoin("routines","routines.id", "=", "actions.routine_id")
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
                Schema::dropIfExists("actions");
            }
        }
    