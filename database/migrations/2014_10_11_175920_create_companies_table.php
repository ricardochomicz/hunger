<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->uuid('uuid');
            $table->string('cnpj')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('url')->unique();
            $table->string('logo')->nullable();

            //Status N não tem acesso ao sistema
            $table->enum('active', ['Y', 'N'])->default('Y');

            $table->date('subscription')->nullable(); //Data cadastro
            $table->date('expires_at')->nullable(); //Data expiração acesso
            $table->string('subscription_id')->nullable(); 
            $table->boolean('subscription_active')->default(false); //Assinatura Ativa
            $table->boolean('subscription_suspended')->default(false); //Assinatura Cancelada
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
