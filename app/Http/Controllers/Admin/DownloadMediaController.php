<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadMediaController extends Controller
{
    public function __invoke(User $user): BinaryFileResponse
    {
        $media = $user->getMedia('media');

        return Response::download($media[0]->getPath(), $media[0]->file_name);
    }
}
