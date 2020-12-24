<?php

// $page = new Page(5, 105);
// var_dump($page->allUrl());
// echo $page->limit();
class Page
{

    // 每页显示多少条
    protected $number;

    // 一共有多少条数据
    protected $totalCount;

    // 总页数
    protected $totalPage;

    // 当前页
    protected $page;

    // url
    protected $url;

    public function __construct($number, $totalCount)
    {
        $this->number = $number;
        $this->totalCount = $totalCount;
        $this->totalPage = $this->getTotalPage();
        $this->page = $this->getPage();
        $this->url = $this->getUrl();
        // echo $this->url;
    }

    public function __get($name)
    {
        if ($name == 'totalPage')
            return $this->totalPage;
        else if ($name == 'page')
            return $this->page;
        return FALSE;
    }

    protected function getTotalPage()
    {
        return ceil($this->totalCount / $this->number);
    }

    protected function getPage()
    {
        if (empty($_GET['page'])) {
            $page = 1;
        } else if ($_GET['page'] > $this->totalPage) {
            $page = $this->totalPage;
        } else if ($_GET['page'] < 1) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        return $page;
    }

    protected function getUrl()
    {
        $scheme = $_SERVER['REQUEST_SCHEME'];
        $host = $_SERVER['SERVER_NAME'];
        $port = $_SERVER['SERVER_PORT'];
        $uri = $_SERVER['REQUEST_URI'];
        // 处理
        $uriArr = parse_url($uri);
        $path = $uriArr['path'];
        if (! empty($uriArr['query'])) {
            parse_str($uriArr['query'], $array);
            unset($array['page']);
            $query = http_build_query($array);
            if ($query != '') {
                $path = $path . '?' . $query;
            }
        }
        // return $scheme.'://'.$host.':'.$port.$path;
        return $scheme . '://' . $host . $path;
    }

    protected function setUrl($str)
    {
        if (strpos($this->url, '?')) {
            $url = $this->url . '&' . $str;
        } else {
            $url = $this->url . '?' . $str;
        }
        return $url;
    }

    public function allUrl()
    {
        return [
            'first' => $this->first(),
            'next' => $this->next(),
            'prev' => $this->prev(),
            'end' => $this->end()
        ];
    }

    public function first()
    {
        return $this->setUrl('page=1');
    }

    public function next()
    {
        // 根据当前page得到下一页的页码
        if ($this->page + 1 > $this->totalPage) {
            $page = $this->totalPage;
        } else {
            $page = $this->page + 1;
        }
        return $this->setUrl('page=' . $page);
    }

    public function prev()
    {
        if ($this->page - 1 < 1) {
            $page = 1;
        } else {
            $page = $this->page - 1;
        }
        return $this->setUrl('page=' . $page);
    }

    public function end()
    {
        return $this->setUrl('page=' . $this->totalPage);
    }

    public function limit()
    {
        /*
         * 0,5 5,5 10,5
         */
        $offset = ($this->page - 1) * $this->number;
        return $offset . ',' . $this->number;
    }
}