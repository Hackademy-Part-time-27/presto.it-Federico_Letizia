<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\Unit;
use Illuminate\Bus\Queueable;
use Spatie\Image\Enums\AlignPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddWatermarkToImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $imagePath;
    private $watermarkPath;


    public function __construct($imagePath, $watermarkPath)
    {
        $this->imagePath = $imagePath;
        $this->watermarkPath = $watermarkPath;

    }

    public function handle()
    {
        $image = Image::load($this->imagePath);

        $image->watermark(base_path($this->watermarkPath), AlignPosition::Center,
                                        paddingX:10, 
                                        paddingY:10,
                                        paddingUnit: Unit::Percent,
                                        width: 300,
                                        height: 50,
                                        heightUnit: Unit::Percent,
                                        fit: Fit::Stretch);
                                        
                                

        $image->save($this->imagePath);
    }
}


