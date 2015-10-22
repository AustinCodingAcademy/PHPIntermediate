<?php

class NetflixSearch
{
    const API_URL = 'http://netflixroulette.net/api/api.php';

    /**
     * Name of the actor
     * @var string
     */
    protected $actor;

    /**
     * Name of the title
     * @var string
     */
    protected $title;

    public function __construct($actor = null, $title = null)
    {
        $this->actor = $actor;
        $this->title = $title;
    }

    /**
     * Search the netflix DB
     * @throws Exception
     * @return array
     */
    public function doSearch()
    {
        $this->validate();

        $queryArray = [];

        // Create an array
        if (isset($this->actor)) {
            $queryArray['actor'] = $this->actor;
        }

        if (isset($this->title)) {
            $queryArray['title'] = $this->title;
        }

        $result = http_build_query($queryArray);
        $url = self::API_URL . '?' . $result;

        $data = file_get_contents($url);

        echo '<pre>';
        print_r($data);
        die();

        // http://netflixroulette.net/api/api.php?actor=Brad+Pitt

        return array('data');
    }

    /**
     * Make sure atleast one property is filled out
     * @throws Exception
     * @return void
     */
    protected function validate()
    {
        if (empty($this->actor)) {
            throw new Exception('Actor is required');
        }
    }


    /**
     * @param string $actor
     */
    public function setActor($actor)
    {
        $this->actor = $actor;
    }
}