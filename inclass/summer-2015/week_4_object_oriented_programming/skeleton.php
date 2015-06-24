<?php

class CountryInformation
{
    const API_URL = 'http://restcountries.eu/rest/v1/name/';

    protected $countryName;

    protected $capital;

    protected $region;

    protected $population;

    protected $languages;

    public function __construct($countryName)
    {
        $this->countryName = $countryName;

        $rawData = $this->getEndpointData();
        $dataArray = $this->convertJsonToArray($rawData);
        $this->populateProperties($dataArray);
    }

    /**
     * Get all data, in raw JSON format from the API
     * @return string
     */
    public function getEndpointData()
    {
        return file_get_contents(self::API_URL . $this->countryName);
    }

    /**
     * @param string $jsonData Raw json data
     * @return array|null
     */
    public function convertJsonToArray($jsonData)
    {
        $jsonArray = json_decode($jsonData, JSON_OBJECT_AS_ARRAY);

        if (sizeof($jsonArray) == 1 && !empty($jsonArray)) {
            return array_pop($jsonArray);
        } else {
            return null;
        }
    }

    /**
     * Assign values from the data array to each of the corresponding properties
     * on this object
     * @param array $dataArray Converted array data from API
     * @throws UserException
     * @return void
     */
    public function populateProperties($dataArray)
    {
        if (empty($dataArray)) {
            throw new UserException('No data found for country ' . $this->countryName);
        }

        $this->capital = $dataArray['capital'];
        $this->region = $dataArray['region'];
        $this->population = number_format($dataArray['population']);
        $this->languages = $dataArray['languages'];
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }
}


class UserException extends Exception{}


// Create a method that will get the data from the endpoint API_URL
try{

    $russia = new CountryInformation('Russia');
    $thailand = new CountryInformation('Thailand');

    echo '<pre>';
    print_r($russia);

    echo '<pre>';
    print_r($thailand);

}catch(UserException $e){

    //echo 'Country is invalid';
    echo '<pre>';
    print_r($e);
}