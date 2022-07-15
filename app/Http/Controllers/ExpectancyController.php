<?php

namespace App\Http\Controllers;

use App\Models\Expectancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as REQ;
use Illuminate\Support\Facades\Schema;

class ExpectancyController extends Controller
{
    public function getExpectancyData()
    {
        $expectancies = Expectancy::all();


        return response()->json([
            'Data' => $expectancies
        ]);
    }

    public function uploadFile(Request $request)
    {
        $csvFile = $request->file('csv_file');

        if (!$csvFile) {
            return back()->with('error', 'File Not Uploaded');
        } else {
            $fileName = $csvFile->getClientOriginalName();
            $locationToStore = 'uploads';
            $csvFile->move($locationToStore, $fileName);
            $filepath = public_path($locationToStore . "/" . $fileName);

            // Read the file and store its data into array
            $initialCount = 0;
            $dataArray = array();
            $csvFile = fopen($filepath, "r");
            while (($filedata = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                // Skip first row of headings
                if ($initialCount == 0) {
                    $initialCount++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $dataArray[$initialCount][] = $filedata[$c];
                }
                $initialCount++;
            }
            fclose($csvFile);
            $finalCount = 0;
            foreach ($dataArray as $importData) {
                $finalCount++;
                try {
                    Expectancy::create([
                        'country_name' => $importData[0],
                        'country_code' => $importData[1],
                        'indicator_name' => $importData[2],
                        'Year_1990' => $importData[3],
                        'Year_1991' => $importData[4],
                        'Year_1992' => $importData[5],
                        'Year_1993' => $importData[6],
                        'Year_1994' => $importData[7],
                        'Year_1995' => $importData[8],
                        'Year_1996' => $importData[9],
                        'Year_1997' => $importData[10],
                        'Year_1998' => $importData[11],
                        'Year_1999' => $importData[12],
                        'Year_2000' => $importData[13],
                        'Year_2001' => $importData[14],
                        'Year_2002' => $importData[15],
                        'Year_2003' => $importData[16],
                        'Year_2004' => $importData[17],
                        'Year_2005' => $importData[18],
                        'Year_2006' => $importData[19],
                        'Year_2007' => $importData[20],
                        'Year_2008' => $importData[21],
                        'Year_2009' => $importData[22],
                        'Year_2010' => $importData[23],
                        'Year_2011' => $importData[24],
                        'Year_2012' => $importData[25],
                        'Year_2013' => $importData[26],
                        'Year_2014' => $importData[27],
                        'Year_2015' => $importData[28],
                        'Year_2016' => $importData[29],
                        'Year_2017' => $importData[30],
                        'Year_2018' => $importData[31],
                        'Year_2019' => $importData[32],
                        'Year_2020' => $importData[33],
                    ]);
                } catch (\Exception $e) {
                    print($e);
                }
            }
            if (REQ::is('api/*'))
                return response()->json([
                    'Success' => "$finalCount expectancy data successfully uploaded"
                ], 200);
            return back()->with('success', "$finalCount expectancy data successfully uploaded");
        }
    }

    public function getYears()
    {
        $columnNames = [];
        $years = [];

        $columns = Schema::getColumnListing('expectancies');
        for ($i = 4; $i < 35; $i++) {
            $columnNames[] = $columns[$i];
        }
        foreach ($columnNames as $columnName) {
            $x = substr($columnName, 5, 4);
            $years[] = $x;
        }
        return $years;
    }

    public function deleteAllData()
    {
        Expectancy::truncate();
        if (REQ::is('api/*'))
            return response()->json([
                'Success' => "Successfully Deleted All Expectancy Data"
            ], 200);
        return back()->with('success', "Successfully Deleted All Expectancy Data");
    }
}
