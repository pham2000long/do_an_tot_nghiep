<?php


namespace Helper;

use Illuminate\Support\Facades\URL;

class ThumbHelper
{
    public static function get_image_slider_url($image = null) {
        if($image != null)
            return asset('images/slider/'.$image);
        else
            return asset('admin/assets/images/no_image.png');
    }

    public static function get_image_post_url($image = null) {
        if($image != null)
            return asset('images/post/'.$image);
        else
            return asset('admin/assets/images/no_image.png');
    }

    public static function get_image_avatar_url($image = null) {
        if($image != null)
            return asset('images/user/'.$image);
        else
            return asset('images/user/no_avatar.jpg');
    }

    public static function get_image_product_url($image = null) {
        if($image != null)
            return URL::asset('images/product_images/'.$image);
        else
            return URL::asset('images/user/no_avatar.jpg');
    }
}
