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
        Schema::create('expectancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name');
            $table->string('country_code');
            $table->string('indicator_name');
            $table->double('Year_1990')->nullable();
            $table->double('Year_1991')->nullable();
            $table->double('Year_1992')->nullable();
            $table->double('Year_1993')->nullable();
            $table->double('Year_1994')->nullable();
            $table->double('Year_1995')->nullable();
            $table->double('Year_1996')->nullable();
            $table->double('Year_1997')->nullable();
            $table->double('Year_1998')->nullable();
            $table->double('Year_1999')->nullable();
            $table->double('Year_2000')->nullable();
            $table->double('Year_2001')->nullable();
            $table->double('Year_2002')->nullable();
            $table->double('Year_2003')->nullable();
            $table->double('Year_2004')->nullable();
            $table->double('Year_2005')->nullable();
            $table->double('Year_2006')->nullable();
            $table->double('Year_2007')->nullable();
            $table->double('Year_2008')->nullable();
            $table->double('Year_2009')->nullable();
            $table->double('Year_2010')->nullable();
            $table->double('Year_2011')->nullable();
            $table->double('Year_2012')->nullable();
            $table->double('Year_2013')->nullable();
            $table->double('Year_2014')->nullable();
            $table->double('Year_2015')->nullable();
            $table->double('Year_2016')->nullable();
            $table->double('Year_2017')->nullable();
            $table->double('Year_2018')->nullable();
            $table->double('Year_2019')->nullable();
            $table->double('Year_2020')->nullable();
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
        Schema::dropIfExists('expectancies');
    }
};
