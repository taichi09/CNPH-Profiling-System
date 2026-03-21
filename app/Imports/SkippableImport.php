<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

abstract class SkippableImport implements ToModel, WithHeadingRow
{
    protected PersonalInformationImport $personalImport;

    public function __construct(PersonalInformationImport $personalImport)
    {
        $this->personalImport = $personalImport;
    }

    /**
     * Checks the Excel employee_id against the list of duplicate Excel ids
     * collected by PersonalInformationImport during the personal_information
     * sheet pass. Returns true = skip this row entirely.
     */
    protected function isDuplicate(array $row): bool
    {
        $excelId = trim((string) ($row['employee_id'] ?? ''));

        if ($excelId === '') return false;

        return in_array($excelId, $this->personalImport->getSkipIds(), true);
    }
}
