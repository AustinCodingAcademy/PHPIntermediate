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
        $this->population = $dataArray['population'];
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
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return number_format($this->population);
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return implode(', ', $this->languages);
    }
}


class UserException extends Exception
{
}

?>
<pre>
// Create a form that accepts a country name, and feed that into the object we just
// Created and display the country information


Your output should look like this

-----------------------
Capital: Moscow
Region: EU
Population: 1234
Languages: en, ru
-----------------------

<form name="countryForm" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    Enter Country: <input type="text" name="countryName" size="30"/>
    <input type="submit"/>
</form>

<hr/>

    <?php
    if ($_POST) {

        try {

            $countryName = $_POST['countryName'];
            $info = new CountryInformation($countryName);
            print_r($info);

            echo 'Capital: ' . $info->getCapital() . '<br/>';
            echo 'Region: ' . $info->getRegion() . '<br/>';
            echo 'Population: ' . $info->getPopulation() . '<br/>';
            echo 'Languages: ' . $info->getLanguages() . '<br/>';

        } catch (UserException $ue) {

            echo '<p style="color:red;">' . $ue->getMessage() . '</p>';
        }
    }
    ?>

</pre>