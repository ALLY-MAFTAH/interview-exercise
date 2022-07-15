<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expectancy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'country_name',
        'country_code',
        'indicator_name',
        'Year_1990',
        'Year_1991',
        'Year_1992',
        'Year_1993',
        'Year_1994',
        'Year_1995',
        'Year_1996',
        'Year_1997',
        'Year_1998',
        'Year_1999',
        'Year_2000',
        'Year_2001',
        'Year_2002',
        'Year_2003',
        'Year_2004',
        'Year_2005',
        'Year_2006',
        'Year_2007',
        'Year_2008',
        'Year_2009',
        'Year_2010',
        'Year_2011',
        'Year_2012',
        'Year_2013',
        'Year_2014',
        'Year_2015',
        'Year_2016',
        'Year_2017',
        'Year_2018',
        'Year_2019',
        'Year_2020',
    ];
    protected $dates = [
        'deleted_at'
    ];
}
