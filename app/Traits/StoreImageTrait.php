<?php

namespace App\Traits;
use App\Models\Field\FieldImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait StoreImageTrait {
    public $savedImages;

    public function imageArray($dir, $images, Model $model, $default = false) : array
    {
        $dir = $dir . $model->id;
        $user_id = Auth::id();
        $this->savedImages = [];
        $imageFill = [];

        foreach($images as $image)
        {
            // update
            if($imageId = $image['id'] ?? false) {
                array_push($this->savedImages, $imageId);
                continue;
            }

            else {
                // check is image front
                $path = $image['path'];
                $imageParts = explode(";base64,", $path);

                $image_base64 = base64_decode($imageParts[1]);

                // take image type
                $imageType = $this->takeImageType($image);

                $file = $dir. '/' . time() .uniqid(). $imageType;

                Storage::disk('public')->put($file, $image_base64);
            }

            array_push($imageFill, ['image' => $file, class_basename($model).'_id' => $model->id, "user_id" => $user_id]);
        }


        return $imageFill;
    }

    private function takeImageType($image): string
    {

        $lil = true;
        $counter = -3;
        while($lil) {
            $imageType = substr($image['name'], $counter--);
            $lil =  $imageType[0] != '.';
        }
        return $imageType;
    }

    public function deleteImagesOf(Model $model)
    {
        $images_id = $model->images->pluck('id');

        foreach($images_id as $id) {
            // проверяет удалено ли фото или нет
            if (!in_array($id, $this->savedImages)) {
                // удаляет фото
                $image = $model->images->find($id);
                $image->delete();
            }
        }
    }


}
