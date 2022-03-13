<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
class DownloadFileController extends Controller
{
    public function getDirectDownload()
    {
        //direct download
        
        $filePath = public_path()."/images/big2.jpg";  //path of your directory
        $fileName = time().'.jpg';
        $headers = array(
            'Content-Description: File Transfer',
            'Content-Type: application/octet-stream',
            'Content-disposition: attachment; filename='.$fileName,
            'Content-Transfer-Encoding: binary',
            'Connection: Keep-Alive'
        );
    	
        return response()->download($filePath, $fileName, $headers);
           

    }

    public function getDynamicDownload(Request $request,$id)
    {
//use the id to get the file from the db

        //for dynamic download
                    $file= public_path()."/images/big1.jpg";  //path of your directory
                    $fileName="mypic.jpg";
                    $headers = array(
                        'Content-Description: File Transfer',
                        'Content-Type: application/octet-stream',
                        'Content-disposition: attachment; filename='.$fileName,
                        'Content-Transfer-Encoding: binary',
                        'Connection: Keep-Alive'
                    );
                     return Response::download($file, $fileName, $headers);      
    }







}
