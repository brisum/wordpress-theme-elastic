<?php

namespace Elastic\Watermark;

class Watermark
{
    /**
     * @param string $imagePath
     * @param string $watermarkPath
     * @param int $watermarkSize percent
     */
    public function placeToCenter($imagePath, $watermarkPath, $watermarkSize = 90)
    {
        $image = imagecreatefromstring(file_get_contents($imagePath));
        $imageWidth = imagesx($image);
        $imageHeight = imagesY($image);
        $watermarkOrig = imagecreatefrompng($watermarkPath);
        $watermarkOrigSize = getimagesize($watermarkPath);
        $watermarkWidth = round($imageWidth / 100 * $watermarkSize);
        $watermarkHeight = round($watermarkWidth / $watermarkOrigSize[0] * $watermarkOrigSize[1]);

        // resize watermark
        $watermarkResized = imagecreatetruecolor($watermarkWidth, $watermarkHeight);
        imagealphablending($watermarkResized, false);
        imagesavealpha($watermarkResized,true);
        $transparent = imagecolorallocatealpha($watermarkResized, 0, 0, 0, 127);
        imagefilledrectangle($watermarkResized, 0, 0, $watermarkWidth, $watermarkHeight, $transparent);
        imagecopyresampled(
            $watermarkResized,
            $watermarkOrig,
            0,
            0,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight,
            $watermarkOrigSize[0],
            $watermarkOrigSize[1]
        );
        $this->imagesetopacity($watermarkResized, 0.6);

        imagealphablending($im, true);
        imagesavealpha($im, true);
        imagecopy(
            $image,
            $watermarkResized,
            $imageWidth / 2 - $watermarkWidth / 2,
            $imageHeight / 2 - $watermarkHeight / 2,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight
        );
        imagejpeg($image, $imagePath);

        imagedestroy($image);
        imagedestroy($watermarkOrig);
    }

    /**
     * @param string $imagePath
     * @param string $watermarkPath
     * @param int $watermarkSize percent
     */
    public function place($imagePath, $watermarkPath, $watermarkSize = 15)
    {
        $image = imagecreatefromstring(file_get_contents($imagePath));
        $imageWidth = imagesx($image);
        $imageHeight = imagesY($image);
        $watermarkOrig = imagecreatefrompng($watermarkPath);
        $watermarkOrigSize = getimagesize($watermarkPath);
        $watermarkWidth = round($imageWidth / 100 * $watermarkSize);
        $watermarkHeight = round($watermarkWidth / $watermarkOrigSize[0] * $watermarkOrigSize[1]);

        $watermarkYCenter = $imageHeight - ($imageHeight * 0.1) - ($watermarkHeight / 2);
        $watermarkXCenter = 0;
        for (; $watermarkYCenter < $imageHeight; $watermarkYCenter++) {
            for ($watermarkXCenter = 0; $watermarkXCenter < $imageWidth; $watermarkXCenter++) {
                $rgb = imagecolorat($image, $watermarkXCenter, $watermarkYCenter);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;

                if (250 > $r || 250 > $g || 250 > $b) {
                    break;
                }
            }

            if (0 < $watermarkXCenter && $watermarkXCenter < $imageWidth) {
                break;
            }
        }

        // resize watermark
        $watermarkResized = imagecreatetruecolor($watermarkWidth, $watermarkHeight);
        imagealphablending($watermarkResized, false);
        imagesavealpha($watermarkResized,true);
        $transparent = imagecolorallocatealpha($watermarkResized, 0, 0, 0, 127);
        imagefilledrectangle($watermarkResized, 0, 0, $watermarkWidth, $watermarkHeight, $transparent);
        imagecopyresampled(
            $watermarkResized,
            $watermarkOrig,
            0,
            0,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight,
            $watermarkOrigSize[0],
            $watermarkOrigSize[1]
        );
        $this->imagesetopacity($watermarkResized, 0.6);

        imagealphablending($im, true);
        imagesavealpha($im, true);
        imagecopy(
            $image,
            $watermarkResized,
            $watermarkXCenter - $watermarkWidth / 2,
            $watermarkYCenter - $watermarkHeight / 2,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight
        );
        imagejpeg($image, $imagePath);

        imagedestroy($image);
        imagedestroy($watermarkOrig);
    }

    function imagesetopacity( $imageSrc, $opacity )
    {
        $width  = imagesx( $imageSrc );
        $height = imagesy( $imageSrc );

        // Set new opacity to each pixel
        for ( $x = 0; $x < $width; ++$x ) {
            for ( $y = 0; $y < $height; ++$y ) {
                $pixelColor = imagecolorat( $imageSrc, $x, $y );
                $pixelOpacity = 127 - (( $pixelColor >> 24 ) & 0xFF );
                if ( $pixelOpacity > 0 ) {
                    $pixelOpacity = $pixelOpacity * $opacity;
                    $pixelColor = ( $pixelColor & 0xFFFFFF ) | ( (int)round( 127 - $pixelOpacity ) << 24 );
                    imagesetpixel( $imageSrc, $x, $y, $pixelColor );
                }
            }
        }
    }
}
