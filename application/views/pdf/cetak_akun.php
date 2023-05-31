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
    text-align: left ;
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
<h2 style="text-align:center;">DATA AKUN PENGGUNA PRAKTIK KERJA LAPANGAN (PKL)</h2>
<h2 style="text-align:center;">SMK NEGERI 1 BANYUANYAR</h2>
		
    <br>
    <table class="tb1" >
        <thead>
            <tr>
                <th  width="10%">No</th>
                <th width="35%">Nama Pengguna</th>
                <th width="20%">Username</th>
                <th width="20%">Password</th>
                <th width="15%">jurusan</th>
            </tr>
        </thead>
        <tbody >
            <?php $i = 1;?>
            <?php foreach ($pengguna as $akun) : ?>
            <tr>
                <td class = "tb1"><?= $i; ?></td>
                <td class = "tb1"><?php echo $akun->nama_siswa ?></td>
                <td class = "tb1"><?php echo $akun->username ?></td>
                <td class = "tb1"><?php echo $akun->password ?></td>
                <td class = "tb1"><?php echo $akun->nama_jurusan ?></td>
            </tr>
            <?php $i++;
            endforeach; ?>
        </tbody>
    </table>
<script>
      window.print()
  </script>
</html>




