<?php

namespace App\Http\Controllers;

use App\Models\IdentifyCard;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class IdentifyCardController extends Controller
{
    public function index()
    {
        return view('ocr.index');
    }

    public function scan(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        // Upload image
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Extract text using Tesseract
        $text = (new TesseractOCR(storage_path("app/public/{$imagePath}")))
            ->lang('eng+khm')  // Recognize both languages
            ->run();

        // Extract surname, last name, and ID number from the text
        preg_match('/([A-Za-z]+)<<([A-Za-z]+)/', $text, $nameMatches);
        preg_match('/IDKHM(\d{10})/', $text, $idMatches);

        // Try a more flexible pattern for the birthday (including variations in spacing)
        preg_match('/ថ្ងៃខែឆ្នាំកំណើត:?\s*(\d{1,2})[:\s.-](\d{1,2})[:\s.-](\d{4})/', $text, $birthdayMatches);

        // Extracted information
        $surname = $nameMatches[1] ?? 'Not found';
        $lastName = $nameMatches[2] ?? 'Not found';
        $idNumber = $idMatches[1] ?? 'Not found';

        // Format birthday if found
        $birthday = isset($birthdayMatches[1], $birthdayMatches[2], $birthdayMatches[3])
            ? "{$birthdayMatches[1]}/{$birthdayMatches[2]}/{$birthdayMatches[3]}"
            : 'Not found';  // Format date as DD/MM/YYYY

        // Return the result to the view
        return view('ocr.result', compact('surname', 'lastName', 'idNumber', 'birthday', 'text'));
    }


}
