<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Laporan Jurnal PKL - ' . $data_jurnal_pkl->nama_siswa);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(true);
$pdf->SetHeaderMargin(0);
$pdf->SetTopMargin(20);
$pdf->SetRightMargin(20);
$pdf->SetLeftMargin(30);
$pdf->setFooterMargin(20);
$pdf->SetAuthor('SMKN 1 Banyuanyar');
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('times', '', 11, '', 'false');
$pdf->AddPage();
$html = '
<h2 style="text-align:center;">JURNAL KEGIATAN PRAKTIK KERJA LAPANGAN (PKL)</h2>
<h2 style="text-align:center;">SMK NEGERI 1 BANYUANYAR</h2>
<hr/>
<hr 
border-top="3px solid black"
height="2px"
border-bottom="1px solid black"
/>  
<table>
    <tr>
    <td></td>
  </tr>
    <tr>
    <td width="30%">Nama Peserta PKL</td>
    <td> : ' . $data_jurnal_pkl->nama_siswa . '</td>
  </tr>
  <tr>
    <td width="30%">Kelas</td>
    <td> : ' . $data_jurnal_pkl->kelas . '</td>
  </tr>
  <tr>
    <td width="30%">Paket Keahlian</td>
    <td> : ' . $data_jurnal_pkl->nama_jurusan . '</td>
  </tr>
  <tr>
    <td width="30%">Nama DUDI</td>
    <td> : ' . $data_jurnal_pkl->nama_dudi . '</td>
  </tr>
  <tr>
    <td width="30%">Alamat</td>
    <td> : ' . $data_jurnal_pkl->alamat_dudi . '</td>
  </tr>
  <tr>
    <td width="30%">Waktu PKL</td>
    <td> : ' . date("d-m-Y", strtotime($data_jurnal_pkl->tanggal_masuk)) . ' - ' . date("d-m-Y", strtotime($data_jurnal_pkl->tanggal_keluar)) . '</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
                    <table style="margin-top: 25px;" cellspacing="2" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="15%" align="center">Tanggal Kegiatan</th>
                            <th width="45%" align="center">kegiatan</th>
                            <th width="40%" align="center">paraf</th>
                        </tr>';
foreach ($jurnal_pkl as $row) {
  $html .= '<tr bgcolor="#ffffff">
                            <td align="center">' . date("d-m-Y", strtotime($row['tanggal'])) . '</td>
                            <td style="text-align:justify;">' . $row['kegiatan'] . '</td>
                            <td style="text-align:justify;">' . $row[''] . '</td>
                        </tr>';
}
$html .= '</table>';

ob_end_clean();
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Jurnal PKL '  . $data_jurnal_pkl->nama_siswa . '.pdf', 'I');
