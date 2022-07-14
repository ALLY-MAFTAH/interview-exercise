<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expectancy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name');
            $table->string('country_code');
            $table->string('indicator_name');
            $table->double('1991');
            $table->double('1992');
            $table->double('1993');
            $table->double('1994');
            $table->double('1995');
            $table->double('1996');
            $table->double('1997');
            $table->double('1998');
            $table->double('1999');
            $table->double('2000');
            $table->double('2001');
            $table->double('2002');
            $table->double('2003');
            $table->double('2004');
            $table->double('2005');
            $table->double('2006');
            $table->double('2007');
            $table->double('2008');
            $table->double('2009');
            $table->double('2010');
            $table->double('2011');
            $table->double('2012');
            $table->double('2013');
            $table->double('2014');
            $table->double('2015');
            $table->double('2016');
            $table->double('2017');
            $table->double('2018');
            $table->double('2019');
            $table->double('2020');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expectancy');
    }
};
