<?php

namespace App\Controllers;

use Illuminate\Request;
use Spatie\PdfToText\Pdf;

use Illuminate\Support\Str;

class pdftxt extends Controller
{
    public function index()
    {

        return response()->json([
            'status' => '422',
            'message' => 'Invalid file',
        ]);
    }
    public function convertToTxt()
    {
        try {
            // Validate the uploaded file
            if (!isset($_FILES['file']['tmp_name'])) {
                throw new \Exception('Invalid file');
            }
    
            // Get the uploaded PDF file
            $pdfFile = $_FILES['file']['tmp_name']['tmp_name'];
    
            // Convert PDF to text using pdftotext utility with WinAnsi encoding
           // Convert PDF to text using pdftotext utility with utf8 encoding
           $pdfToText = shell_exec('C:\xampp\htdocs\PDFtools\poppler\bin\pdftotext ' . escapeshellarg($pdfFile) . ' -');
    
            // Save text data to a file
            $fileName = $_FILES['file']['tmp_name']['name'] . '.txt';
            file_put_contents($fileName, $pdfToText);
    
            // Download the text file
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            readfile($fileName);
            unlink($fileName);
        } catch (\Exception $e) {
            // Return error message and status code in case of an error
            header('HTTP/1.1 422 Unprocessable Entity');
            echo json_encode([
                'status' => '422',
                'message' => 'Invalid file',
            ]);
        }
    }
    



    public function convertToJson()
    {
        try {
            // Validate the uploaded file
            

            // Get the uploaded PDF file
            $file = $_FILES['file']['tmp_name'];
            $text = file_get_contents($file);
            $encoding = mb_detect_encoding($text);

            // Convert the text to UTF-8 and then to an array
            $utf8Text = iconv($encoding, 'UTF-8', $text);

            $dataArray = explode("\n", $utf8Text);
            $dataArray =  str_replace("\r", "", $dataArray);
            // Initialize an array to store the data
            $data = [];
            // // Loop through each line and extract the data
            //1
            $group = 'group';
            $key = 'key';
            $pattern = '/\s+/'; // matches digits followed by a dot and one or more spaces
            $replacement = ''; // replace with empty string
            for ($i =  0; $i < sizeof($dataArray); $i++) {
                $line = trim($dataArray[$i]);

                // Check if the line contains a colon (':')
                if (strpos($line, ':') !== false) {
                    $parts = explode(':', $line, 2);
                    if (is_numeric(Str::slug(pathinfo(trim($line), PATHINFO_FILENAME), '_'))) {
                        if (strpos($line, '. ') !== false) {
                            $group =  Str::slug(pathinfo($line, PATHINFO_FILENAME), '_');
                        }
                    }

                    // Split the line into key and value
                    $key = preg_replace($pattern, $replacement, trim($parts[0]));
                    if (strpos($dataArray[$i + 1], ':') !== false) {
                        $value = trim($dataArray[$i]);
                    } else    if (strpos($dataArray[$i + 2], ':') !== false) {
                        $value = trim($dataArray[$i]) . " " . trim($dataArray[$i + 1]);
                    } else {
                        $value = trim($dataArray[$i]) . " " . trim($dataArray[$i + 1]) . " " . trim($dataArray[$i + 2]);;
                    }
                    $legal_representative = explode(':', $value);
                    if (sizeof($legal_representative) >= 2) {
                        $data[$group][Str::slug(pathinfo($key, PATHINFO_FILENAME), '_')] =  trim($legal_representative[1]);
                    }
                }
            }
            $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
            $newFilename =   $file->getClientOriginalName() . '.json'; // your new JSON file name
            // Storage::put($newFilename, $jsonData);
            return response()->download(storage_path("app/{$newFilename}"))->deleteFileAfterSend();
            //end data
        } catch (\Exception $e) {
            // Return error message and status code in case of an error
            return response()->json([
                'status' => '100',
                'message' => 'Invalid file',
            ], 422);
        }
        //   Return a view with the JSON data
    }


    public function convertToJsontest()
    {

        // Validate the uploaded file
    

        // Get the uploaded PDF file
        $file = $_FILES['file']['tmp_name'];
        $text = file_get_contents($file);
        $encoding = mb_detect_encoding($text);

        // Convert the text to UTF-8 and then to an array
        $utf8Text = iconv($encoding, 'UTF-8', $text);

        $dataArray = explode("\n", $utf8Text);
        $dataArray =  str_replace("\r", "", $dataArray);
        // Initialize an array to store the data
        $data = [];
        // // Loop through each line and extract the data
        //1
        $group = 'group';
        $key = 'key';
        $pattern = '/\s+/'; // matches digits followed by a dot and one or more spaces
        $replacement = ''; // replace with empty string
        for ($i =  0; $i < sizeof($dataArray); $i++) {
            $line = trim($dataArray[$i]);

            // Check if the line contains a colon (':')
            if (strpos($line, ':') !== false) {
                $parts = explode(':', $line, 2);
                if (is_numeric(Str::slug(pathinfo(trim($line), PATHINFO_FILENAME), '_'))) {
                    if (strpos($line, '. ') !== false) {
                        $group =  Str::slug(pathinfo($line, PATHINFO_FILENAME), '_');
                    }
                }

                // Split the line into key and value
                $key = preg_replace($pattern, $replacement, trim($parts[0]));
                if (isset($dataArray[$i + 1]) && strpos($dataArray[$i + 1], ':') !== false) {
                    $value = trim($dataArray[$i]) . " " . trim($dataArray[$i + 1]);
                } else  if (isset($dataArray[$i + 2]) && strpos($dataArray[$i + 2], ':') !== false) {
                    $value = trim($dataArray[$i]) . " " . trim($dataArray[$i + 1]) . " " . trim($dataArray[$i + 2]);;
                } else {
                    $value = trim($dataArray[$i]);
                }
                $legal_representative = explode(':', $value);
                if (sizeof($legal_representative) >= 2) {
                    $data[$group][Str::slug(pathinfo($key, PATHINFO_FILENAME), '_')] =  trim($legal_representative[1]);
                }
            }
        }
        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
        $newFilename =   $file->getClientOriginalName() . '.json'; // your new JSON file name

        file_put_contents($newFilename, $jsonData);

        // Download the text file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $newFilename . '"');
        readfile($newFilename);
        unlink($newFilename);
        //end data

        //   Return a view with the JSON data
    }
  public  function Windows1252ToUTF8()
    {
      
    }
    public function convertfilepdfencode()
    {

        // Validate the uploaded file
      

        // Get the uploaded PDF file
        $pdfFile = $_FILES['file']['tmp_name'];

        // Convert PDF to text using pdftotext utility with WinAnsi encoding
        // $pdfToText = (new Pdf(getenv('PDFTOTEXT_PATH')))
        //     ->setOptions(['-enc', 'ISO-8859-1', '-raw', '-q'])
        //     ->setPdf($pdfFile)
        //     ->text();
            $pdfToText = (new Pdf(getenv('PDFTOTEXT_PATH')))
            ->setOptions(['-enc' => 'MacRoman'])
            ->setPdf($pdfFile)
         
            ->text();


        // Save text data to a file
        $fileName = $pdfFile->getClientOriginalName() . '.txt';
        // Storage::put($fileName, $pdfToText);

        // Download the text file
        return response()->download(storage_path('app/' . $fileName))->deleteFileAfterSend(true);
    }
    public function convertPdfToText()
    {
        // $pdfFile = '/assets/uploads/new_announcement(654).pdf';
        // $textFile = '/assets/uploads/new_announcement(654).txt';


        // // Set the command to convert the PDF to text using pdfboxXXX
        // $command = 'java -jar ' . base_path() . '/vendor/pdfbox-app-3.0.0-alpha3.jar ExtractText -encoding WinAnsiEncoding /assets/uploads/new_announcement(654).pdf /assets/uploads/new_announcement(654).txt';

        // // Run the command using the Symfony Process component
        // $process = new Process(explode(' ', $command));
        // $process->run();

        // // Check if the command was successful, and handle any errors
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // // Read the converted text from the output file
        // $text = file_get_contents($textFile);

        // // Return the converted text
  
    
        // // Return the converted text
        // echo $text;
 

    }
    
}
