<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Infrastructure\Services\Upload;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of S3
 *
 * @author nicolas
 */
class S3 {
    
    public static function boot() {

        $client = new S3Client([
            'credentials' => [
                'key'    => getenv('S3_KEY'),
                'secret' => getenv('S3_SECRET')
            ],
            'region' => getenv('S3_REGION'),
            'version' => 'latest',
        ]);

        $adapter = new AwsS3Adapter($client, getenv('S3_BUCKET'));
        $filesystem = new Filesystem($adapter,['visibility' => 'public']);

        return $filesystem;

    }

    public function uploadFile(UploadedFile $file, $folder, $name='')
    {
        if(!$name){
            $name = self::random();
        }
        $name .= '.'.$file->guessExtension();

        $cloud = self::boot();
        if($cloud->put($folder.'/'.$name, file_get_contents($file->getRealPath()))){
            return $name;
        }
        throw new Exception('Could not upload file.',400);
    }
    
    private static function random($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
    
    public function delete($path)
    {
        try{
            $cloud = self::boot();
            $cloud->delete($path);
            return true;
        } catch (\League\Flysystem\FileNotFoundException $e){
            return false;
        }
    }
}
