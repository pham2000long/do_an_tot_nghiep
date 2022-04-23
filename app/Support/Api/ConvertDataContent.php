<?php

namespace App\Support\Api;

use App\Repositories\SnapshotContract;
use DOMDocument;
use Illuminate\Support\Str;

class ConvertDataContent
{
    protected $DOMDocument;
    protected $snapshotRepository;

    public function __construct(
        DOMDocument $DOMDocument,
        SnapshotContract $snapshotRepository
    ) {
        $this->DOMDocument = $DOMDocument;
        $this->snapshotRepository = $snapshotRepository;
    }

    public function convertData($content, $name, $link)
    {
        // $this->DOMDocument = new \DomDocument();

        // conver utf-8 to html entities
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $this->DOMDocument->loadHtml($content, LIBXML_HTML_NODEFDTD);
        $images = $this->DOMDocument->getElementsByTagName('img');

        foreach($images as $key => $img){
            $data = $img->getAttribute('src');
            if(Str::containsAll($data, ['data:image', 'base64'])) {
                list(, $type) = explode('data:image/', $data);
                list($type, ) = explode(';base64,', $type);

                list(, $data) = explode(';base64,', $data);

                $data = base64_decode($data);

                $imageName = $name . Str::random(20) .'.' . $type;

                $this->snapshotRepository->putThumb($imageName, $data, $link);

                $url = asset('images') . '/' . $link . '/' . $imageName;
                $img->removeAttribute('src');
                $img->setAttribute('src', $url);
            }
        }

        $content = $this->DOMDocument->saveHTML();

        //conver html-entities to utf-8
        $content = mb_convert_encoding($content, "UTF-8", 'HTML-ENTITIES');

        //get content
        list(, $content) = explode('<html><body>', $content);
        list($content, ) = explode('</body></html>', $content);

        return $content;
    }
}
