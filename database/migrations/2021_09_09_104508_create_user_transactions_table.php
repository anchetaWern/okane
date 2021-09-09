<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\UserCategory;
use App\Models\UserFund;

class CreateUserTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('transaction_datetime');
            $table->foreignIdFor(User::class);

            $table->foreignIdFor(UserCategory::class);

            $table->enum('transaction_type', ['income', 'expense', 'donation', 'savings', 'investment']);

            $table->string('summary')->nullable();

            $table->bigInteger('source_user_fund_id');
            $table->bigInteger('destination_user_fund_id')->nullable();

            $table->float('amount');
            $table->float('transfer_fee')->nullable();

            $table->string('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_transactions');
    }
}
