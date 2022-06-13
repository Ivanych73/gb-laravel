<?php

namespace App\Services;

use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

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

    public function parseAndSrore($source): void
    {
        $this->setLink($source->url);
        $news = $this->parse()['news'];
        foreach ($news as $newsItem) {
            if (!$this->newsExist($newsItem['link'])) {
                $content = $newsItem['description'] . ' Полностью новость можно просмотерть по этой <a href=' .
                    $newsItem['link'] . '>ссылке</a>';
                $newsRecord = News::create([
                    'title' => $newsItem['title'],
                    'annotation' => $newsItem['description'],
                    'content' => $content,
                    'source_id' => $source->id,
                    'source_url' => $newsItem['link']
                ]);
            }
        }
    }

    public function newsExist(string $url): bool
    {
        if (News::where('source_url', $url)->get()->first()) {
            return true;
        }
        return false;
    }
}
