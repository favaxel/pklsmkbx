<style>
</style>
<!DOCTYPE html>
<html>
<script type="text/javascript" src= https://code.jquery.com/jquery-3.7.0.min.js></script>
<script type="text/javascript">
    // function printPengajuan(pengajuan) {
    //     var printPage = document.getElementById(pengajuan).innerHTML;
    //     var oriPage = document.body.innerHTML;
    //     document.body.innerHTML = printPage;
    //     window.print();
    //     document.body.innerHTML = oriPage;
    // }
</script>
<head>
    <title>cetak pengajuan pkl</title>
    <style type="text/css">
        .kiri    { text-align: left;}
   .kanan   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}
   .border1{
    
    border-bottom :5px double #000;
   }
   .paragraf { font-size:16px; line-height: 1.5em;}
   body{
    font-family: "Times New Roman", Times, serif;
   }
   pre{
    font-family: "Times New Roman", Times, serif;
   }
		
        table {
			order: 1px solid #ffffff;
			border-style: none;
		}
		table tr .text2 {
			text-align: right;
			font-size: 16px;
		}
		table tr .text {
			text-align: center;
			font-size: 16px;
		}
		table tr td {
			font-size: 16px;
            font-family: "Times New Roman", Times, serif;
		}
		.garis1{
		border-top:3px solid black;
		height: 2px;
		border-bottom:1px solid black;
}
.tb1 {
    font-family: "Times New Roman", Times, serif;
    color: #000000;
    border-collapse: collapse;
    border: 1px solid #000000; 
    padding: 5px 20px;
    text-align: justify;
}
 
.tb, th {
    border: 1px solid #000000;
    padding: 5px 20px;
    text-align: center;
}
.tb1, td {
    
}
h1 {
  font-size: 18px; /* 40px/16=2.5em */
}

h2 {
  font-size: 16px; /* 30px/16=1.875em */
}
p {
  font-size: 16px; /* 14px/16=0.875em */
}
	</style>  
</head>
<body>

		<table class = "border1">
			<tr>
            <tr>
                 <td> <img src="assets/img/logo_provinsi.png" width="110" height="130"> </td>
                 <td>
                 <!-- <font size="4">PEMERINTAH  PROVINSI  JAWA  TIMUR</font><br>
                    <font size="4">DINAS PENDIDIKAN</font><br>
					<font size="5"><b>SEKOLAH MENENGAH KEJURUAN NEGERI 1 BANYUANYAR</b></font><br>
					<font size="4">JL. KLENANG LOR NO 100, BANYUANYAR , TELP. 0335-613348</font><br>
					<font size="4">EMAIL: <u>smkn1.banyuanyar@yahoo.com<u></font><br>
                    <font size="4"><b>P R O B O L I N G G O</b></font> <br> -->
                    
                    <!-- <p class="kanan">Jember, 16 mei 2019</p> -->
                    <center><p>PEMERINTAH  PROVINSI  JAWA  TIMUR</p>
                    <p>DINAS PENDIDIKAN</p>
                    <H1><b>SEKOLAH MENENGAH KEJURUAN NEGERI 1 BANYUANYAR</b></H1>
                    <p>JL. KLENANG LOR NO 100, BANYUANYAR , TELP. 0335-613348</p>
                    <p>EMAIL: <u>smkn1.banyuanyar@yahoo.com<u></p>
                    <p><b>P R O B O L I N G G O</b></p></center>
                    <p style = "text-align: right">kode pos : 67275</p> 
                 </td>
            </tr>
            </tr>
				<!-- <td width="22%"><img src="assets/img/logo_provinsi.png" width="110" height="130"></td>
				<td>
				<center>
                    <p>PEMERINTAH  PROVINSI  JAWA  TIMUR</p>
                    <p>DINAS PENDIDIKAN</p>
                    <H1><b>SEKOLAH MENENGAH KEJURUAN NEGERI 1 BANYUANYAR</b></H1>
                    <p>JL. KLENANG LOR NO 100, BANYUANYAR , TELP. 0335-613348</p>
                    <p>EMAIL: <u>smkn1.banyuanyar@yahoo.com<u></p>
                    <H1><b>P R O B O L I N G G O</b></H1>
					<font size="16px">PEMERINTAH  PROVINSI  JAWA  TIMUR</font><br>
                    <font size="16">DINAS PENDIDIKAN</font><br>
					<font size="19px"><b>SEKOLAH MENENGAH KEJURUAN NEGERI 1</b></font><br>
                    <font size="19px"><b>BANYUANYAR</b></font><br>
					<font size="16px">JL. KLENANG LOR NO 100, BANYUANYAR , TELP. 0335-613348</font><br>
					<font size="16px">EMAIL: <u>smkn1.banyuanyar@yahoo.com<u></font><br>
                    <font size="19px"><b>P R O B O L I N G G O</b></font> -->
				
                
				<!-- </td> -->
			 
		<!-- <table width="625">
			
		</table> -->
        
            </table>
            <br>
            <table>
            <tbody>
            <tr><td></td><td></td><td></td><td height =" 10px">Probolinggo,<?= date('d F Y'); ?></td>
            <tr><td>Nomor</td><td>:</td><td width="320px">420/228/101.6.3.26/2023</td>
            <tr><td>Lampiran</td><td>:</td><td>-</td></tr><td>Kepada</td>
            <?php foreach ($pengajuanpkl as $pengajuan) : ?>
            <tr><td>Perihal</td><td>:</td><td>Permohonan Tempat </td><td>Yth.Pimpinan</td></tr>
            <tr><td></td><td></td><td>Praktik Kerja Lapangan (PKL)</td><td><?php echo $pengajuan->nama_dudi ?></td>
            <?php break; ?>
            <?php endforeach; ?>
            <tr><td></td><td></td><td></td><td height =" 10px">di Tempat</td>
        </tbody>
    </table>
    <br>
           <table>
        <tbody>
            <tr>
            <td>Dengan Hormat,</td>
            </tr>
            <?php foreach ($pengajuanpkl as $pengajuan) : ?>
            <tr>
                <td class="justify paragraf">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam rangka memenuhi kurikulum dan melakasanakan program kerja
                sekolah serta menambah wawasan tentang Dunia Kerja bagi peserta didik di
                SMKN 1 Banyuanyar, maka dengan ini kami memohon bantuan Bapak/Ibu untuk
                memberikan izin kepada peserta didik SMKN 1 Banyuanyar untuk melaksanakan
                kegiatan Praktik Kerja Lapangan (PKL) pada Instansi/Perusahaan yang Bapak/Ibu pimpin. 
                Adapun rencana program kegiatan PKL tersebut akan berlangsung selama&nbsp;<?php echo $pengajuan->durasi ?>&nbsp;
                bulan dimulai tanggal&nbsp;<?php echo date("d-m-Y", strtotime($pengajuan->tanggal_masuk)) ?>&nbsp;s.d&nbsp;<?php echo date("d-m-Y", strtotime($pengajuan->tanggal_keluar)) ?>.
                </td>
            </tr>
            <?php break; ?>
            <?php endforeach; ?>
            <tr>
                <td class="justify paragraf">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adapun nama siswa yang akan mengikuti PKL tersebut adalah:
                </td>
            </tr>
        </tbody>    
           </table>
   <br>
    <table class="tb1" >
        <thead>
            <tr>
                <th  width="10%">No</th>
                <th width="50%">Nama Siswa</th>
                <th width="20%">Kelas</th>
                <th width="20%">Keterangan</th>
            </tr>
        </thead>
        <tbody >
            <?php $i = 1;?>
            <?php foreach ($pengajuanpkl as $pengajuan) : ?>
            <tr>
                <td class = "tb1"><?= $i; ?></td>
                <td class = "tb1"><?php echo $pengajuan->nama_siswa ?></td>
                <td class = "tb1"><?php echo $pengajuan->kelas ?></td>
                <td class = "tb1"></td>
            </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
        <tr>
                <td class="justify paragraf">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Permohonan PKL ini kami ajukan, atas perhatian dan kerjasamanya kami sampaikan terimakasih.
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table align=right width="700">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala SMK N 1 Banyuanyar<br><br><br><br><br><b><u>SUMARIADI, S.PD., MM</u></b><br><b>NIP.</b></td>
			</tr>
	     </table>
<?php  ?>                   
</body>
<script>
      window.print()
  </script>
</html>




