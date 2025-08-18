<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Lesson;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class WasabiController extends Controller
{
    private function client()
    {
        return new S3Client([
            'version'     => 'latest',
            'region'      => env('WASABI_REGION'),
            'endpoint'    => env('WASABI_ENDPOINT'),
            'credentials' => [
                'key'    => env('WASABI_ACCESS_KEY'),
                'secret' => env('WASABI_SECRET_KEY'),
            ],
        ]);
    }

    // Step 1: start multipart upload
    public function createMultipartUpload(Request $request)
    {
        $s3 = $this->client();

        $result = $s3->createMultipartUpload([
            'Bucket' => env('WASABI_BUCKET'),
            'Key'    => $request->filename,
        ]);

        return response()->json([
            'uploadId' => $result['UploadId'],
            'key'      => $result['Key'],
        ]);
    }

    // Step 2: presigned URL for chunk
    public function getPresignedUrl(Request $request)
    {
        $s3 = $this->client();

        $cmd = $s3->getCommand('UploadPart', [
            'Bucket'     => env('WASABI_BUCKET'),
            'Key'        => $request->key,
            'UploadId'   => $request->uploadId,
            'PartNumber' => $request->partNumber,
        ]);

        $url = $s3->createPresignedRequest($cmd, '+60 minutes')->getUri();

        return response()->json(['url' => (string) $url]);
    }

    // Step 3: complete upload
    public function completeMultipartUpload(Request $request)
    {
        $s3 = $this->client();

        $result = $s3->completeMultipartUpload([
            'Bucket'   => env('WASABI_BUCKET'),
            'Key'      => $request->key,
            'UploadId' => $request->uploadId,
            'MultipartUpload' => [
                'Parts' => $request->parts,
            ],
        ]);

        return response()->json($result);
    }

    // Step 4: attach video to lesson
    public function attachVideo(Request $request, Lesson $lesson)
    {
        $lesson->update([
            'video_path' => $request->key,
        ]);

        return response()->json([
            'message' => 'Video attached successfully',
            'lesson'  => $lesson
        ]);
    }
}
