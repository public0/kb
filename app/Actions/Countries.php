<?php

namespace App\Actions;

trait Countries
{
    private $countries = [
        'ro' => 'Romania',
        'rs' => 'Serbia'
    ];

    /**
     * Get all countries
     *
     * @return array
     */
    protected function getAllCountries()
    {
        return $this->countries;
    }

    /**
     * Get country name
     *
     * @param string $code
     * @return string|null
     */
    protected function getCountryNameByCode($code)
    {
        return $this->countries[$code] ?? null;
    }

    /**
     * Get country code
     *
     * @param string $name
     * @return string|null
     */
    protected function getCountryCodeByName($name)
    {
        $result = array_flip($this->countries);

        return $result[$name] ?? null;
    }
}
