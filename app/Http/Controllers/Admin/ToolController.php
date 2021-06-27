<?php

namespace App\Http\Controllers\Admin;

use Html2Text\Html2Text;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('admin.tool.index');
    }

    public function CalculateAndGetDensity(Request $request) {
        if ($request->isMethod('GET')) {

            if (isset($request->keywordInput)) { // Test the parameter is set.
                $html = new Html2Text($request->keywordInput); // Setup the html2text obj.
                $text = strtolower($html->getText()); // Execute the getText() function and convert all text to lower case to prevent work duplication
                $totalWordCount = str_word_count($text); // Get the total count of words in the text string
                $wordsAndOccurrence  = array_count_values(str_word_count($text, 1)); // Get each word and the occurrence count as key value array
                arsort($wordsAndOccurrence); // Sort into descending order of the array value (occurrence)

                $keywordDensityArray = [];
                // Build the array
                foreach ($wordsAndOccurrence as $key => $value) {
                    $keywordDensityArray[] = ["keyword" => $key, // keyword
                        "count" => $value, // word occurrences
                        "density" => round(($value / $totalWordCount) * 100,2)]; // Round density to two decimal places.
                }

                return $keywordDensityArray;
            }
        }
    }
}
