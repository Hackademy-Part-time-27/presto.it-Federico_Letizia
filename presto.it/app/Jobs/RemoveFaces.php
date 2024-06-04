<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Enums\Unit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Spatie\Image\Enums\Fit;

class RemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $adv_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($adv_image_id)
    {
        $this->adv_image_id = $adv_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->adv_image_id);
        
        if (!$i)
        {
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];

            $image = SpatieImage::load($srcPath);

            $image->watermark(base_path('resources/img/smile.png'), AlignPosition::TopLeft,
                                                                    paddingX:$bounds[0][0], paddingY:$bounds[0][1],
                                                                    width:50,widthUnit:Unit::Percent,
                                                                    height:50,heightUnit:Unit::Percent,
                                                                    fit: Fit::Stretch);

            $image->watermark(base_path('resources/img/presto-logo.png'), AlignPosition::BottomRight,
                                                                          width:100,
                                                                          height:50,);
           


            $image->save($srcPath);
                
        }

        $imageAnnotator->close();
    }
}
