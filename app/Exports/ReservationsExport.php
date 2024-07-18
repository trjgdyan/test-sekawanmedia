<?php

namespace App\Exports;

use App\Models\Reservation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReservationsExport
{
    protected $reservations;

    public function __construct($reservations)
    {
        $this->reservations = $reservations;
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Address');
        $sheet->setCellValue('D1', 'Phone Number');
        $sheet->setCellValue('E1', 'Vehicle');
        $sheet->setCellValue('F1', 'License Plate');
        $sheet->setCellValue('G1', 'Ownership');
        $sheet->setCellValue('H1', 'Service Schedule');
        $sheet->setCellValue('I1', 'Start Date');
        $sheet->setCellValue('J1', 'End Date');

        // Add data
        $row = 2;
        foreach ($this->reservations as $index => $reservation) {
            $companyOwned = '';
            if ($reservation->vehicle->is_company_owned == 1) {
                $companyOwned = 'Company Owned';
            } else {
                $companyOwned = 'Rental Owned';
            }
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $reservation->name);
            $sheet->setCellValue('C' . $row, $reservation->address);
            $sheet->setCellValue('D' . $row, $reservation->phone_number);
            $sheet->setCellValue('E' . $row, $reservation->vehicle->name);
            $sheet->setCellValue('F' . $row, $reservation->vehicle->license_plate);
            $sheet->setCellValue('G' . $row, $companyOwned);
            $sheet->setCellValue('H' . $row, $reservation->vehicle->service_schedule);
            $sheet->setCellValue('I' . $row, $reservation->start_date);
            $sheet->setCellValue('J' . $row, $reservation->end_date);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'reservations.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}
