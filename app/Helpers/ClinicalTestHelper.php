<?php

use Illuminate\Support\Arr;

if (!function_exists('getTestsForDataType')) {
    /**
     * Get tests for a given data type.
     *
     * @param string $dataType  The key from config('clinical_tests.data_types')
     * @param string $returnType 'full' | 'names' | 'models'
     * @return array
     */
    function getTestsForDataType(string $dataType, string $returnType = 'full'): array
    {
        $allTests  = config('ctms.tests');

        $dataTypes = config('ctms.data_types');

        // If data type doesn't exist, return empty array
        if (!isset($dataTypes[$dataType])) {
            return [];
        }

        $testKeys = $dataTypes[$dataType]['tests'] ?? [];
        $selectedTests = Arr::only($allTests, $testKeys);

        return match ($returnType) {
            'names'  => array_column($selectedTests, 'name'),
            'models' => array_column($selectedTests, 'model'),
            default  => $selectedTests, // full details
        };
    }
}
