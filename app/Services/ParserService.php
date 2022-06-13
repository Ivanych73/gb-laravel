<?php

namespace App\Services;

use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function parse(): array
    {
        $xml = XmlParser::load($this->link);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'lastBuildDate' => [
                'uses' => 'lastBuildDate'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }

    public function parseMultiple($sources): array
    {
        $res = [];
        foreach ($sources as $source) {
            $this->setLink($source->url);
            $news = $this->parse()['news'];
            foreach ($news as &$newsItem) {
                $newsItem['source_id'] = $source->id;
            }
            $res = array_merge($res, $news);
        }
        return $res;
    }
}
