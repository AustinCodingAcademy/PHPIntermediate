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
     * @return void
     */
    public function populateProperties($dataArray)
    {

    }
}


// Create a method that will get the data from the endpoint API_URL
$countryInfo = new CountryInformation('Mongolia');
echo '<pre>';
print_r($countryInfo);
