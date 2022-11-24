<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laboratorium');
        $this->load->model('M_ruangan');
        $this->load->model('M_bhp');
        $this->load->model('M_persediaan');
        $this->load->model('M_barangmodal');
    }

    public function exportBhp($idLab)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Jenis Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Sisa Barang');
        $sheet->setCellValue('F1', 'Satuan');
        $sheet->setCellValue('G1', 'Tahun Anggaran');
        $sheet->setCellValue('H1', 'Tanggal Terima');
        $sheet->setCellValue('I1', 'Harga Satuan');
        $sheet->setCellValue('J1', 'Vendor');
        $sheet->setCellValue('K1', 'Kondisi');
        $sheet->setCellValue('L1', 'Spesifikasi');
        $sheet->setCellValue('M1', 'Keterangan');
        $barang = $this->M_bhp->daftarBarang($idLab);
        $namaLab = $this->M_laboratorium->namaLab($idLab);

        $no = 1;
        $x = 2;
        foreach ($barang as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nama_barang);
            $sheet->setCellValue('C' . $x, $row->jenis_barang);
            $sheet->setCellValue('D' . $x, $row->jumlah);
            $sheet->setCellValue('E' . $x, $row->sisa_barang);
            $sheet->setCellValue('F' . $x, $row->satuan);
            $sheet->setCellValue('G' . $x, $row->tahun_anggaran);
            $sheet->setCellValue('H' . $x, $row->tanggal_terima);
            $sheet->setCellValue('I' . $x, $row->harga_satuan);
            $sheet->setCellValue('J' . $x, $row->vendor);
            $sheet->setCellValue('K' . $x, $row->kondisi);
            $sheet->setCellValue('L' . $x, $row->spesifikasi);
            $sheet->setCellValue('M' . $x, $row->keterangan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('YmdHs') . ' - ' . $namaLab['nama_lab'] . ' - BHP';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportPersediaan($idLab)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Jenis Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Sisa Barang');
        $sheet->setCellValue('F1', 'Satuan');
        $sheet->setCellValue('G1', 'Tahun Anggaran');
        $sheet->setCellValue('H1', 'Tanggal Terima');
        $sheet->setCellValue('I1', 'Harga Satuan');
        $sheet->setCellValue('J1', 'Vendor');
        $sheet->setCellValue('K1', 'Kondisi');
        $sheet->setCellValue('L1', 'Spesifikasi');
        $sheet->setCellValue('M1', 'Keterangan');
        $barang = $this->M_persediaan->daftarBarang($idLab);
        $namaLab = $this->M_laboratorium->namaLab($idLab);

        $no = 1;
        $x = 2;
        foreach ($barang as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nama_barang);
            $sheet->setCellValue('C' . $x, $row->jenis_barang);
            $sheet->setCellValue('D' . $x, $row->jumlah);
            $sheet->setCellValue('E' . $x, $row->sisa_barang);
            $sheet->setCellValue('F' . $x, $row->satuan);
            $sheet->setCellValue('G' . $x, $row->tahun_anggaran);
            $sheet->setCellValue('H' . $x, $row->tanggal_terima);
            $sheet->setCellValue('I' . $x, $row->harga_satuan);
            $sheet->setCellValue('J' . $x, $row->vendor);
            $sheet->setCellValue('K' . $x, $row->kondisi);
            $sheet->setCellValue('L' . $x, $row->spesifikasi);
            $sheet->setCellValue('M' . $x, $row->keterangan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('YmdHs') . ' - ' . $namaLab['nama_lab'] . ' - Persediaan';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportBarangModal($idRuang)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Barang BMN');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Kondisi');
        $sheet->setCellValue('F1', 'Tahun Perolehan');
        $sheet->setCellValue('G1', 'Harga Satuan');
        $sheet->setCellValue('H1', 'Deskripsi');
        $sheet->setCellValue('I1', 'Keterangan');
        $sheet->setCellValue('J1', 'Lokasi Ruangan');
        $sheet->setCellValue('K1', 'Laboratorium');

        $barang = $this->M_barangmodal->getBarangLab($idRuang);
        $namaRuang = $this->M_ruangan->getDetailRuangan($idRuang);

        $no = 1;
        $x = 2;
        foreach ($barang as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->id_barang_bmn);
            $sheet->setCellValue('C' . $x, $row->nama_barang);
            $sheet->setCellValue('D' . $x, $row->status);
            $sheet->setCellValue('E' . $x, $row->kondisi);
            $sheet->setCellValue('F' . $x, $row->tahun_perolehan);
            $sheet->setCellValue('G' . $x, $row->harga_satuan);
            $sheet->setCellValue('H' . $x, $row->deskripsi);
            $sheet->setCellValue('I' . $x, $row->keterangan);
            $sheet->setCellValue('J' . $x, $row->nama_ruangan);
            $sheet->setCellValue('K' . $x, $row->nama_lab);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = date('YmdHs') . ' - ' . $namaRuang['nama_ruangan'] . ' - Barang Modal';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
